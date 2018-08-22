<?php

namespace App\Http\Controllers;

use App\Instructor;
use Illuminate\Http\Request;

class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $instructors = Instructor::orderBy('name')
                    ->paginate(10);

      return view('backend.instructor.list',compact('instructors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.instructor.edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $instructor = new Instructor;

      //$request->validate($user->rules,$user->messages);

      $instructor->name = $request->name;

      if ($instructor->save()){
        return redirect('instructor')->with('informations',['Os dados do instrutor foram salvos com sucesso!']);
      } else {
        return back()->with('problems',['Ocorreu um erro ao salvar os dados do instrutor!']);
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function show(Instructor $instructor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function edit(Instructor $instructor)
    {
        return view('backend.instructor.edit', compact('instructor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Instructor $instructor)
    {
      //$request->validate($user->rules,$user->messages);

      $instructor->name = $request->name;

      if ($instructor->save()){
        return redirect('instructor')->with('informations',['Os dados do instrutor foram alterados com sucesso!']);
      } else {
        return back()->with('problems',['Ocorreu um erro ao alterar os dados do instrutor!']);
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Instructor $instructor)
    {
      if ($instructor->courses->count()>0){
        $message = getMsgDeleteErrorVinculated();
      } else {
        if (isAdmin()){
          if ($instructor->delete()){
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
