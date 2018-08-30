<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Course;
use App\Category;
use App\Instructor;
use App\Trail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if (Auth::check()){

        $totalPupil = User::where('type','U')->count();
        $totalCourses = User::count();
        $totalCategories = Category::count();
        $totalInstructors = Instructor::count();
        $totalInstructors = Instructor::count();
        $totalTrails = Trail::count();

        return view('backend.home',compact('totalPupil','totalCategories','totalCourses','totalInstructors','totalTrails'));

      } else {
        return view('frontend.home');
      }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function terms()
    {
        return view('frontend.terms');
    }

}
