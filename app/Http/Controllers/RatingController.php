<?php

namespace App\Http\Controllers;

use App\Rating;
use App\Course;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function __construct()
    {
      $this->middleware('OnlyAdmin')->except('store','course');
      $this->middleware('OnlyRegistered')->only('store');
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

    public function course($courseId)
    {
      $course = Course::find($courseId);

      $breadcrumbs = [
        'Cursos' => 'course',
        $course->title => 'course/'.$course->id,
        'Avaliações' => '#'
      ];

      return view('backend.rating.list',compact('breadcrumbs','course'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $rating = new Rating;
      //$request->validate($user->rules,$user->messages);

      $rating->comment = $request->comment;
      $rating->rate = $request->rate;
      $rating->course_id = $request->course_id;
      $rating->user_id = getUserId();

      if ($rating->save()){
        return back()->with('informations',['Os dados da avaliação foram salvos com sucesso!']);
      } else {
        return back()->with('problems',['Ocorreu um erro ao salvar os dados da avaliação!']);
      }
    }

    public function remove($ratingId)
    {
      $rating = Rating::find($ratingId);

      if ($rating->delete()){
        return back()->with('informations',['A avaliação foi excluída com sucesso!']);
      } else {
        return back()->with('problems',['Ocorreu um erro ao excluir a avaliação!']);
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function show(Rating $rating)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function edit(Rating $rating)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rating $rating)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rating $rating)
    {
        //
    }
}
