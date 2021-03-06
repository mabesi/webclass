<?php

namespace App\Http\Controllers;

use App\Question;
use App\Examination;
use Illuminate\Http\Request;
use App\Events\CourseContentChanged;

class QuestionController extends Controller
{
    public function __construct()
    {
      $this->middleware('OnlyAdmin');
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
    public function create($examinationId)
    {
      $examination = Examination::find($examinationId);
      $unity = $examination->unity;

      $breadcrumbs = [
        'Cursos' => 'course',
        $unity->course->title => 'course/'.$unity->course->id,
        $unity->title => 'unity/'.$unity->id,
        'Avaliação '.$examination->sequence => 'examination/'.$examination->id,
        'Nova Questão' => '#',
      ];

      return view('backend.question.edit',compact('examination','breadcrumbs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $question = new Question;

      $request->validate($question->rules,$question->messages);

      $examination = Examination::find($request->examination_id);

      foreach($examination->questions as $uquestion){
        if ($uquestion->sequence==$request->sequence){
          return back()->with('problems',['O número de sequência de questão ( '.$request->sequence.' ) já existe nesta avaliação!']);
        }
      }

      $question->sequence = $request->sequence;
      $question->statement = clean($request->statement);
      $question->answer1 = clean($request->answer1);
      $question->answer2 = clean($request->answer2);
      $question->answer3 = clean($request->answer3);
      $question->answer4 = clean($request->answer4);
      $question->right_answer = $request->right_answer;
      $question->examination_id = $request->examination_id;

      if ($question->save()){
        return redirect('examination/'.$question->examination_id)->with('informations',['Os dados da questão foram salvos com sucesso!']);
      } else {
        return back()->with('problems',['Ocorreu um erro ao salvar os dados da questão!']);
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
      $examination = $question->examination;
      $unity = $examination->unity;

      $breadcrumbs = [
        'Cursos' => 'course',
        $unity->course->title => 'course/'.$unity->course->id,
        $unity->title => 'unity/'.$unity->id,
        'Avaliação '.$examination->sequence => 'examination/'.$examination->id,
        'Editar Questão '.$question->sequence => '#',
      ];

      return view('backend.question.edit',compact('question','examination','breadcrumbs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
      $request->validate($question->rules,$question->messages);

      $examination = $question->examination;

      foreach($examination->questions as $uquestion){
        if ($uquestion->sequence==$request->sequence && $uquestion->id != $question->id){
          return back()->with('problems',['O número de sequência de questão ( '.$request->sequence.' ) já existe nesta avaliação!']);
        }
      }

      $question->sequence = $request->sequence;
      $question->statement = clean($request->statement);
      $question->answer1 = clean($request->answer1);
      $question->answer2 = clean($request->answer2);
      $question->answer3 = clean($request->answer3);
      $question->answer4 = clean($request->answer4);
      $question->right_answer = $request->right_answer;
      $question->examination_id = $request->examination_id;

      if ($question->save()){
        return redirect('examination/'.$question->examination_id)->with('informations',['Os dados da questão foram salvos com sucesso!']);
      } else {
        return back()->with('problems',['Ocorreu um erro ao salvar os dados da questão!']);
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
      if (isAdmin()){
        if ($question->delete()){
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
