<?php

namespace App\Http\Controllers;

use App\Courseware;
use App\Course;
use Illuminate\Http\Request;
use App\Events\CourseContentChanged;

class CoursewareController extends Controller
{
    public function __construct()
    {
      $this->middleware('OnlyAdmin')->except('show');
      $this->middleware('OnlyRegistered')->only('show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($courseId)
    {
      $course = Course::find($courseId);
      $breadcrumbs = [
        'Cursos' => 'course',
        $course->title => 'course/'.$course->id,
        'Nova Arquivo' => '#',
      ];
      return view('backend.courseware.edit',compact('course','breadcrumbs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $courseware = new Courseware;

      $request->validate($courseware->rules,$courseware->messages);

      if ($request->courseware->getError()!=0){
        return back()->with('problems',['Ocorreu um erro ao carregar o arquivo!','Erro: '.$request->courseware->getErrorMessage()]);
      }

      $courseware->title = $request->title;
      $courseware->course_id = $request->course_id;

      $courseDir = 'courseware/'.$request->course_id;
      $fileName = saveFile($request,'courseware',$courseDir);

      if ($fileName==False){
        return back()->with('problems',['Ocorreu um erro ao carregar o arquivo!']);
      } else {
        $courseware->name = $fileName;
      }

      if ($courseware->save()){
        event(new CourseContentChanged($courseware->course));
        return redirect('course/'.$courseware->course_id)->with('informations',['Os dados do arquivo foram salvos com sucesso!']);
      } else {
        return back()->with('problems',['Ocorreu um erro ao salvar os dados do arquivo!']);
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Courseware  $courseware
     * @return \Illuminate\Http\Response
     */
    public function show(Courseware $courseware)
    {
      $courseDir = 'courseware/'.$courseware->course->id;
      $file = $courseDir.'/'.$courseware->name;
      if (fileExists($file)){
        return downloadLocalFile($file);
      } else {
        return downloadFakeFile($file);
        //return back()->with('problems',['Ocorreu um erro ao baixar o arquivo!']);
      }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Courseware  $courseware
     * @return \Illuminate\Http\Response
     */
    public function edit(Courseware $courseware)
    {
      $course = $courseware->course;
      $breadcrumbs = [
        'Cursos' => 'course',
        $course->title => 'course/'.$course->id,
        'Editar Arquivo' => '#',
      ];
      return view('backend.courseware.edit',compact('course','courseware','breadcrumbs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Courseware  $courseware
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Courseware $courseware)
    {
      $request->validate($courseware->rules,$courseware->messages);

      $courseware->title = $request->title;
      $courseware->course_id = $request->course_id;

      if ($request->has('courseware')){

        if ($request->courseware->getError()!=0){
          return back()->with('problems',['Ocorreu um erro ao carregar o arquivo!','Erro: '.$request->courseware->getErrorMessage()]);
        }

        $courseDir = 'courseware/'.$request->course_id;
        $fileName = saveFile($request,'courseware',$courseDir,Null,$courseware->name);

        if ($fileName==False){
          return back()->with('problems',['Ocorreu um erro ao carregar o arquivo!']);
        } else {
          $courseware->name = $fileName;
        }
      }

      if ($courseware->save()){
        event(new CourseContentChanged($courseware->course));
        return redirect('course/'.$courseware->course_id)->with('informations',['Os dados do arquivo foram salvos com sucesso!']);
      } else {
        return back()->with('problems',['Ocorreu um erro ao salvar os dados do arquivo!']);
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Courseware  $courseware
     * @return \Illuminate\Http\Response
     */
    public function destroy(Courseware $courseware)
    {
      $course = $courseware->course;

      if (isAdmin()){

        $courseDir = 'courseware/'.$courseware->course_id;
        $file = $courseDir.'/'.$courseware->name;

        if ($courseware->delete()){
          event(new CourseContentChanged($course));
          deleteLocalFile($file);
          $message = getMsgDeleteSuccess();
        } else {
          $message = getMsgDeleteError();
        }
      } else {
        $message = getMsgDeleteAccessForbidden();
      }
      return response()->json($message);
    }
}
