<?php

namespace App\Http\Controllers;

use App\Unity;
use App\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($unityId)
    {
      $unity = Unity::find($unityId);
      $breadcrumbs = [
        'Categorias' => 'category',
        'Cursos' => 'course',
        $unity->course->category->name => 'category/'.$unity->course->category_id,
        $unity->course->title => 'course/'.$unity->course->id,
        $unity->title => 'unity/'.$unity->id,
        'Nova Videoaula' => '#',
      ];
      return view('backend.lesson.edit',compact('unity','breadcrumbs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $lesson = new Lesson;
      //$request->validate($user->rules,$user->messages);

      $id = getYoutubeId($request->link);

      if (!$id){
        return back()->with('problems',['O link do vídeo fornecido não é válido!']);
      }

      $lesson->sequence = $request->sequence;
      $lesson->title = $request->title;
      $lesson->link = $request->link;
      $lesson->unity_id = $request->unity_id;

      if ($lesson->save()){
        return redirect('unity/'.$lesson->unity_id)->with('informations',['Os dados da videoaula foram salvos com sucesso!']);
      } else {
        return back()->with('problems',['Ocorreu um erro ao salvar os dados da videoaula!']);
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function show(Lesson $lesson)
    {
      $unity = $lesson->unity;
      $breadcrumbs = [
        'Categorias' => 'category',
        'Cursos' => 'course',
        $unity->course->category->name => 'category/'.$unity->course->category_id,
        $unity->course->title => 'course/'.$unity->course->id,
        $unity->title => 'unity/'.$unity->id,
        $lesson->title => '#',
      ];
      return view('backend.lesson.lesson',compact('breadcrumbs','lesson'));
    }

    public function modal($lessonId)
    {
      $lesson = Lesson::find($lessonId);
      return view('backend.lesson.modal',compact('lesson'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function edit(Lesson $lesson)
    {
      $unity = $lesson->unity;
      $breadcrumbs = [
        'Categorias' => 'category',
        'Cursos' => 'course',
        $unity->course->category->name => 'category/'.$unity->course->category_id,
        $unity->course->title => 'course/'.$unity->course->id,
        $unity->title => 'unity/'.$unity->id,
        $lesson->title => 'lesson/'.$lesson->id,
        'Editar Videoaula' => '#',
      ];
      return view('backend.lesson.edit',compact('lesson','unity','breadcrumbs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lesson $lesson)
    {
      //$request->validate($user->rules,$user->messages);

      $id = getYoutubeId($request->link);

      if (!$id){
        return back()->with('problems',['O link do vídeo fornecido não é válido!']);
      }

      $lesson->sequence = $request->sequence;
      $lesson->title = $request->title;
      $lesson->link = $request->link;
      $lesson->unity_id = $request->unity_id;

      if ($lesson->save()){
        return redirect('unity/'.$lesson->unity_id)->with('informations',['Os dados da videoaula foram salvos com sucesso!']);
      } else {
        return back()->with('problems',['Ocorreu um erro ao salvar os dados da videoaula!']);
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lesson $lesson)
    {
        //
    }
}
