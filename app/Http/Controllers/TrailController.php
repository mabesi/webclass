<?php

namespace App\Http\Controllers;

use App\Trail;
use App\Course;
use Illuminate\Http\Request;

class TrailController extends Controller
{
    public function __construct()
    {
      $this->middleware('OnlyAdmin')->except('index','show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $trails = Trail::orderBy('title')
                    ->paginate(10);

      $breadcrumbs = [
        'Trilhas de Formação' => '#',
      ];

      return view('backend.trail.list',compact('breadcrumbs','trails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $breadcrumbs = [
        'Trilhas de Formação' => 'trail',
        'Nova Trilha' => '#'
      ];

      return view('backend.trail.edit',compact('breadcrumbs','trail'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $trail = new Trail;
      //$request->validate($user->rules,$user->messages);

      $trail->title = $request->title;
      $trail->description = $request->description;

      if ($trail->save()){
        return redirect('trail/'.$trail->id)->with('informations',['Os dados da trilha foram salvos com sucesso!']);
      } else {
        return back()->with('problems',['Ocorreu um erro ao salvar os dados da trilha!']);
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Trail  $trail
     * @return \Illuminate\Http\Response
     */
    public function show(Trail $trail)
    {
      $courses = Course::orderBy('title')->get();

      $breadcrumbs = [
        'Trilhas de Formação' => 'trail',
        $trail->title => '#'
      ];

      return view('backend.trail.trail',compact('trail','breadcrumbs','courses'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Trail  $trail
     * @return \Illuminate\Http\Response
     */
    public function edit(Trail $trail)
    {
      $breadcrumbs = [
        'Trilhas de Formação' => 'trail',
        $trail->title => 'trail/'.$trail->id,
        'Editar Trilha' => '#'
      ];

      return view('backend.trail.edit',compact('breadcrumbs','trail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Trail  $trail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trail $trail)
    {
      //$request->validate($user->rules,$user->messages);

      $trail->title = $request->title;
      $trail->description = $request->description;

      if ($trail->save()){
        return redirect('trail/'.$trail->id)->with('informations',['Os dados da trilha foram salvos com sucesso!']);
      } else {
        return back()->with('problems',['Ocorreu um erro ao salvar os dados da trilha!']);
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Trail  $trail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trail $trail)
    {
      if ($trail->courses->count()>0){
        $message = getMsgDeleteErrorVinculated('Cursos');
      } else {
        if (isAdmin()){
          if ($trail->delete()){
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

    public function includeCourse(Request $request, $trailId)
    {
      $trail = Trail::find($trailId);

      $sequence = $request->sequence;
      $courseId = $request->course_id;

      if ($trail->courses()->find($courseId)!=Null){
        return back()->with('warnings',['Este curso já está na trilha!']);
      }

      if ($trail->courses()->where('pivot_sequence',$sequence)->get()->count()>0){
        return back()->with('warnings',['Outro curso já ocupa este número de ordem na trilha!']);
      }

      $trail->courses()->attach($courseId, ['sequence' => $sequence]);

      if ($trail->courses()->find($courseId)->count()>0){
        return back()->with('informations',['O curso foi incluído com sucesso!']);
      } else {
        return back()->with('problems',['Ocorreu um erro ao incluir o curso!']);
      }
    }

    public function removeCourse($trailId,$courseId)
    {
      $trail = Trail::find($trailId);

      $trail->courses()->detach($courseId);

      if ($trail->courses()->find($courseId)==Null){
        $message = getMsgRemoveSuccess();
      } else {
        $message = getMsgRemoveError();
      }

      return response()->json($message);
    }
}
