<?php

namespace App\Http\Controllers;

use App\Examination;
use App\Unity;
use Illuminate\Http\Request;

class ExaminationController extends Controller
{
    public function __construct()
    {
      $this->middleware('OnlyAdmin')->except('show','attempt');
      $this->middleware('OnlyRegistered')->only('show','attempt');
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

    public function attempt(Request $request, $examinationId)
    {
      dd($request);
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
      if ($examination->questions->count()>0){
        $message = getMsgDeleteErrorVinculated('Questões');
      } else {
        if (isAdmin()){
          if ($examination->delete()){
            $message = getMsgDeleteSuccess();
          } else {
            $message = getMsgDeleteError();
          }
        } else {
          $message = getMsgDeleteAccessForbidden();
        }
      }
      return response()->json($message);
    }
}
