<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\User;
use App\Category;
use App\Instructor;

class CourseController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index(Request $request)
  {
    $path = $request->path();

    $search = $request->only('title','category','instructor');

    //dd($search);

    $queryLink = getQueryLink($request->except('sort','dir'));

    $courses = Course::query();

    if (isset($search['title'])){
      $courses->where('title','like','%'.$search["title"].'%');
    }

    if (isset($search['category'])){
      $categoriesId = Category::getCategoriesId($search['category']);
      $courses->whereIn('category_id',$categoriesId);
    }

    if (isset($search['instructor'])){
      $instructorsId = Instructor::getInstructorsId($search['instructor']);
      $courses->whereIn('instructor_id',$instructorsId);
    }

    $sort = $request->query('sort','title');
    $dir = $request->query('dir','asc');
    $newDir = ($dir=='asc'?'desc':'asc');

    $courses = $courses->orderBy($sort,$dir)
    ->paginate(10);

    //dd($courses);

    return view('backend.course.list',compact('courses','search','sort','dir','newDir','path','queryLink'));
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

    return view('backend.course.edit',compact('categories','instructors'));
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
    //$request->validate($user->rules,$user->messages);

    $course->title = $request->title;
    $course->category_id = $request->category_id;
    $course->instructor_id = $request->instructor_id;
    $course->keywords = $request->keywords;

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
    $data = [
      'course' => $course,
    ];

    return view('backend.course.course',$data);
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

    return view('backend.course.edit', compact('course','categories','instructors'));
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
    //$request->validate($user->rules,$user->messages);

    $course->title = $request->title;
    $course->category_id = $request->category_id;
    $course->instructor_id = $request->instructor_id;
    $course->keywords = $request->keywords;

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
    if (isAdmin()){
      if ($course->delete()){
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
