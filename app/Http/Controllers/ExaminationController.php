<?php

namespace App\Http\Controllers;

use App\Examination;
use App\Unity;
use Illuminate\Http\Request;
use App\Events\CourseContentChanged;

class ExaminationController extends Controller
{
    public function __construct()
    {
      $this->middleware('OnlyAdmin')->except('show','attempt','verification','retry');
      $this->middleware('OnlyRegistered')->only('show','attempt','verification','retry');
    }

    public function attempt(Request $request, $examinationId)
    {
      $examination = Examination::find($examinationId);

      $examination->users()->detach(getUserId());

      $answer = $request->question;

      $totalQuestions = $examination->questions()->count();
      $totalHits = 0;
      $test = Array();

      foreach ($examination->questions as $question){
        if ($question->right_answer == $answer[$question->id]){
          $totalHits++;
        }
      }

      $grade = (int) ((100 / $totalQuestions) * $totalHits);

      $result = getQueryLink($answer,':',';',' ');

      $examination->users()->attach(getUserId(),['grade' => $grade, 'result' => $result]);

      return redirect('examination/'.$examination->id.'/verification')
                    ->with('informations',['A avaliação foi enviada com sucesso. Confira as respostas e a sua nota!']);

    }

    public function retry($examinationId)
    {
      $examination = Examination::find($examinationId);
      $examination->users()->detach(getUserId());
      return redirect('examination/'.$examination->id);
    }

    public function verification($examinationId)
    {
      $examination = Examination::find($examinationId);

      if ($examination->users()->where('id',getUserId())->first()==Null){
        return redirect('examination/'.$examination->id)->with('problems',['Esta avaliação ainda não foi respondida!']);
      }

      $unity = $examination->unity;
      $breadcrumbs = [
        'Cursos' => 'course',
        $unity->course->title => 'course/'.$unity->course->id,
        $unity->title => 'unity/'.$unity->id,
        'Avaliação '.$examination->sequence => '#',
      ];

      $pivot = $examination->users()->where('id',getUserId())->first()->pivot;

      $result = $pivot->result;
      $result = explode(';',$result);
      $answer = Array();
      foreach($result as $item){
        $item = explode(':',$item);
        $answer[$item[0]] = $item[1];
      }

      return view('backend.examination.verification',compact('examination','pivot','answer','breadcrumbs'));
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
        'Nova Avaliação' => '#',
      ];
      return view('backend.examination.edit',compact('unity','breadcrumbs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $examination = new Examination;

      $request->validate($examination->rules,$examination->messages);

      $unity = Unity::find($request->unity_id);
      $course = $unity->course;

      foreach($course->unities as $unity){
        if (isset($unity->examination->sequence)){
          if ($unity->examination->sequence==$request->sequence && $examination->id!=$unity->examination->id){
            return back()->with('problems',['O número de sequência de avaliação ( '.$request->sequence.' ) já existe neste curso!']);
          }
        }
      }

      $examination->sequence = $request->sequence;
      $examination->unity_id = $request->unity_id;

      if ($examination->save()){
        return redirect('unity/'.$examination->unity_id)->with('informations',['Os dados da avaliação foram salvos com sucesso!']);
      } else {
        return back()->with('problems',['Ocorreu um erro ao salvar os dados da avaliação!']);
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Examination  $examination
     * @return \Illuminate\Http\Response
     */
    public function show(Examination $examination)
    {
      $unity = $examination->unity;
      $breadcrumbs = [
        'Cursos' => 'course',
        $unity->course->title => 'course/'.$unity->course->id,
        $unity->title => 'unity/'.$unity->id,
        'Avaliação '.$examination->sequence => '#',
      ];
      return view('backend.examination.examination',compact('breadcrumbs','examination'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Examination  $examination
     * @return \Illuminate\Http\Response
     */
    public function edit(Examination $examination)
    {
      $unity = $examination->unity;
      $breadcrumbs = [
        'Cursos' => 'course',
        $unity->course->title => 'course/'.$unity->course->id,
        $unity->title => 'unity/'.$unity->id,
        'Avaliação '.$examination->sequence => 'examination/'.$examination->id,
        'Editar Avaliação' => '#',
      ];
      return view('backend.examination.edit',compact('unity','examination','breadcrumbs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Examination  $examination
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Examination $examination)
    {
      $request->validate($examination->rules,$examination->messages);

      $course = $examination->unity->course;

      foreach($course->unities as $unity){
        if (isset($unity->examination->sequence)){
          if ($unity->examination->sequence==$request->sequence && $examination->id!=$unity->examination->id){
            return back()->with('problems',['O número de sequência de avaliação ( '.$request->sequence.' ) já existe neste curso!']);
          }
        }
      }

      $examination->sequence = $request->sequence;
      $examination->unity_id = $request->unity_id;

      if ($examination->save()){
        return redirect('unity/'.$examination->unity_id)->with('informations',['Os dados da avaliação foram salvos com sucesso!']);
      } else {
        return back()->with('problems',['Ocorreu um erro ao salvar os dados da avaliação!']);
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Examination  $examination
     * @return \Illuminate\Http\Response
     */
    public function destroy(Examination $examination)
    {
      $unity = $examination->unity;

      if (isAdmin()){
        if ($examination->delete()){
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
