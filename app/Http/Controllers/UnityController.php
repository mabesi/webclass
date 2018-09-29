<?php

namespace App\Http\Controllers;

use App\Unity;
use App\Course;
use Illuminate\Http\Request;
use App\Events\CourseContentChanged;

class UnityController extends Controller
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
          'Nova Unidade' => '#',
        ];
        return view('backend.unity.edit',compact('course','breadcrumbs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $unity = new Unity;

      $request->validate($unity->rules,$unity->messages);

      $unity->title = $request->title;
      $unity->course_id = $request->course_id;
      $unity->sequence = $request->sequence;

      if ($unity->save()){
        event(new CourseContentChanged($unity->course));
        return redirect('course/'.$unity->course_id)->with('informations',['Os dados da unidade foram salvos com sucesso!']);
      } else {
        return back()->with('problems',['Ocorreu um erro ao salvar os dados da unidade!']);
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Unity  $unity
     * @return \Illuminate\Http\Response
     */
    public function show(Unity $unity)
    {
      onlyRegistered($unity->course);

      $breadcrumbs = [
        'Cursos' => 'course',
        $unity->course->title => 'course/'.$unity->course->id,
        $unity->title => '#'
      ];

      return view('backend.unity.unity',compact('unity','breadcrumbs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Unity  $unity
     * @return \Illuminate\Http\Response
     */
    public function edit(Unity $unity)
    {
      $course = $unity->course;

      $breadcrumbs = [
        'Cursos' => 'course',
        $course->title => 'course/'.$course->id,
        $unity->title => 'unity/'.$unity->id,
        'Editar Unidade' => '#',
      ];
      return view('backend.unity.edit',compact('course','unity','breadcrumbs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Unity  $unity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unity $unity)
    {
      $request->validate($unity->rules,$unity->messages);

      $unity->title = $request->title;
      $unity->course_id = $request->course_id;
      $unity->sequence = $request->sequence;

      if ($unity->save()){
        event(new CourseContentChanged($unity->course));
        return redirect('course/'.$unity->course_id)->with('informations',['Os dados da unidade foram salvos com sucesso!']);
      } else {
        return back()->with('problems',['Ocorreu um erro ao salvar os dados da unidade!']);
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Unity  $unity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unity $unity)
    {
      $course = $unity->course;

      if (isAdmin()){
        if ($unity->delete()){
          event(new CourseContentChanged($course));
          $message = getMsgDeleteSuccess('course/'.$course->id);
        } else {
          $message = getMsgDeleteError();
        }
      } else {
        $message = getMsgDeleteAccessForbidden();
      }

      return response()->json($message);
    }
}
