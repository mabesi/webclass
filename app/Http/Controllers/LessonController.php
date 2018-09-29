<?php

namespace App\Http\Controllers;

use App\Unity;
use App\Lesson;
use Illuminate\Http\Request;
use App\Events\CourseContentChanged;

class LessonController extends Controller
{
    public function __construct()
    {
      $this->middleware('OnlyAdmin')->except('show','modal','watched');
      $this->middleware('OnlyRegistered')->only('show','modal','watched');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    public function watched($lessonId)
    {
      $lesson = Lesson::find($lessonId);
      $lesson->users()->attach(getUserId());
      return redirect('unity/'.$lesson->unity->id);
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
        'Cursos' => 'course',
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

      $request->validate($lesson->rules,$lesson->messages);

      $id = getYoutubeId($request->link);

      if (!$id){
        return back()->with('problems',['O link do vídeo fornecido não é válido!']);
      }

      $unity = Unity::find($request->unity_id);

      foreach($unity->lessons as $ulesson){
        if ($ulesson->sequence==$request->sequence){
          return back()->with('problems',['O número de sequência de videoaula ( '.$request->sequence.' ) já existe nesta unidade!']);
        }
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
        'Cursos' => 'course',
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
        'Cursos' => 'course',
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
      $request->validate($lesson->rules,$lesson->messages);

      $unity = $lesson->unity;

      $id = getYoutubeId($request->link);

      if (!$id){
        return back()->with('problems',['O link do vídeo fornecido não é válido!']);
      }

      foreach($unity->lessons as $ulesson){
        if ($ulesson->sequence==$request->sequence && $ulesson->id != $lesson->id){
          return back()->with('problems',['O número de sequência de videoaula ( '.$request->sequence.' ) já existe nesta unidade!']);
        }
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
      $unity = $lesson->unity;

      if (isAdmin()){
        if ($lesson->delete()){
          $message = getMsgDeleteSuccess('unity/'.$unity->id);
        } else {
          $message = getMsgDeleteError();
        }
      } else {
        $message = getMsgDeleteAccessForbidden();
      }
      return response()->json($message);
    }
}
