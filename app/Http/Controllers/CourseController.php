<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Course;
use App\User;
use App\Category;
use App\Instructor;

class CourseController extends Controller
{

  public function __construct()
  {
    $this->middleware('OnlyAdmin')->except('index','show','register','myCourses','certificate','pdfCertificate');
    $this->middleware('OnlyRegistered')->only('certificate','pdfCertificate');
  }

  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index(Request $request)
  {
    $path = $request->path();

    $search = $request->query('search');

    $queryLink = getQueryLink($request->except('sort','dir'));

    if (isAdmin()){
      $courses = Course::query();
    } else {
      $courses = Course::where('status','C');
    }

    if ($search!=Null){

      $categoriesId = Category::getCategoriesId($search);
      $instructorsId = Instructor::getInstructorsId($search);

      $courses->where('title','like','%'.$search.'%')
              ->orWhere('keywords','like','%'.$search.'%')
              ->orWhere(function ($query) use ($categoriesId) {
                $query->whereIn('category_id',$categoriesId);
              })
              ->orWhere(function ($query) use ($instructorsId) {
                $query->whereIn('instructor_id',$instructorsId);
              });
    }

    $sort = $request->query('sort','title');
    $dir = $request->query('dir','asc');
    $newDir = ($dir=='asc'?'desc':'asc');

    $courses = $courses->orderBy($sort,$dir)
                        ->paginate(10);

    $breadcrumbs = [
      'Cursos' => '#',
    ];

    return view('backend.course.list',
                compact(
                  'courses',
                  'search',
                  'sort',
                  'dir',
                  'newDir',
                  'path',
                  'queryLink',
                  'breadcrumbs'));
  }

  public function certificate($courseId)
  {
    $course = Course::find($courseId);

    if ($course->progress()==100 && $course->average()>=70){
      $user = getUser();
      $downloadButton = True;
      $breadcrumbs = [
        'Cursos' => 'course',
        $course->title => 'course/'.$course->id,
        'Meu Certificado' => '#'
      ];
      return view('backend.course.certificate',compact('course','breadcrumbs','user','downloadButton'));
    } else {
      return back()->with('warnings',['Para obter o certificado você deve concluir o curso, com média mínima de 70.']);
    }
  }

  public function pdfCertificate($courseId)
  {
    $course = Course::find($courseId);
    if ($course->progress()==100 && $course->average()>=70){
      $user = getUser();
      $downloadButton = False;
      $pdf = PDF::loadView('backend.course.certificate',compact('course','user','downloadButton'));
      return $pdf->setPaper('a4', 'landscape')->setWarnings(false)->download('certificado.pdf');
    } else {
      return back()->with('warnings',['Para obter o certificado você deve concluir o curso, com média mínima de 70.']);
    }
  }

  public function register($courseId)
  {
    $course = Course::find($courseId);

    if ($course != Null){
      $course->users()->attach(getUserId());
      return redirect('course/'.$course->id)->with('informations',['A inscrição foi realizada com sucesso!']);
    } else {
      return back()->with('problems',['Inscrição não realizada. O curso solicitado não foi encontrado!']);
    }
  }

  public function myCourses()
  {
    $user = getUser();
    $courses = $user->courses()
                    ->where('status','C')
                    ->orderBy("title")
                    ->paginate(16);

    $breadcrumbs = [
      'Meus Cursos' => '#',
    ];

    return view('backend.course.mycourses',
                compact(
                  'courses',
                  'breadcrumbs'));
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    $categories = Category::get()->sortBy('name',SORT_NATURAL|SORT_FLAG_CASE);
    $instructors = Instructor::get()->sortBy('name',SORT_NATURAL|SORT_FLAG_CASE);;

    $breadcrumbs = [
      'Cursos' => 'course',
      'Novo Curso' => '#'
    ];

    return view('backend.course.edit',compact('breadcrumbs','categories','instructors'));
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    $course = new Course;

    $request->validate($course->rules,$course->messages);

    $course->title = $request->title;
    $course->category_id = $request->category_id;
    $course->instructor_id = $request->instructor_id;
    $course->keywords = $request->keywords;
    $course->description = clean($request->description);

    if ($course->save()){
      return redirect('course')->with('informations',['Os dados do curso foram salvos com sucesso!']);
    } else {
      return back()->with('problems',['Ocorreu um erro ao salvar os dados do curso!']);
    }
  }

  /**
  * Display the specified resource.
  *
  * @param  \App\Course  $course
  * @return \Illuminate\Http\Response
  */
  public function show(Course $course)
  {
    $userRating = $course->ratings()->where('user_id',getUserId())->first();
    $progress = $course->progress();
    $average = $course->average();

    $breadcrumbs = [
      'Cursos' => 'course',
      $course->title => '#'
    ];

    return view('backend.course.course',compact('course','breadcrumbs','userRating','progress','average'));
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  \App\Course  $course
  * @return \Illuminate\Http\Response
  */
  public function edit(Course $course)
  {
    $categories = Category::get()->sortBy('name',SORT_NATURAL|SORT_FLAG_CASE);
    $instructors = Instructor::get()->sortBy('name',SORT_NATURAL|SORT_FLAG_CASE);;

    $breadcrumbs = [
      'Cursos' => 'course',
      $course->title => 'course/'.$course->id,
      'Editar Curso' => '#'
    ];

    return view('backend.course.edit',
                 compact('breadcrumbs','course','categories','instructors'));
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\Course  $course
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, Course $course)
  {
    $request->validate($course->rules,$course->messages);

    if ($course->status=='E' || $course->status=='C'){
      if ($request->status=='N'){
        return back()->with('problems',['Um curso Completo ou Em Elaboração não pode retornar para o status Novo!']);
      }
    }

    $course->title = $request->title;
    $course->category_id = $request->category_id;
    $course->instructor_id = $request->instructor_id;
    $course->keywords = $request->keywords;
    $course->status = $request->status;
    $course->description = clean($request->description);

    if ($course->save()){
      return redirect('course')->with('informations',['Os dados do curso foram alterados com sucesso!']);
    } else {
      return back()->with('problems',['Ocorreu um erro ao alterar os dados do curso!']);
    }
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\Course  $course
  * @return \Illuminate\Http\Response
  */
  public function destroy(Course $course)
  {
    if ($course->users->count()>0){
      $message = getMsgDeleteErrorVinculated('Alunos');
    } elseif (isAdmin()){
      $courseDir = 'courseware/'.$course->id;
      if ($course->delete()){
        deleteLocalDir($courseDir);
        $message = getMsgDeleteSuccess('course');
      } else {
        $message = getMsgDeleteError();
      }
    } else {
      $message = getMsgDeleteAccessForbidden();
    }

    return response()->json($message);
  }

}
