<?php

namespace App\Http\Controllers;

use App\Unity;
use Illuminate\Http\Request;

class UnityController extends Controller
{
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Unity  $unity
     * @return \Illuminate\Http\Response
     */
    public function show(Unity $unity)
    {
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Unity  $unity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unity $unity)
    {
        //
    }
}
