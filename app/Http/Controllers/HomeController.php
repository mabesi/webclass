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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if (Auth::check()){

        $totalPupil = User::where('type','U')->count();
        $totalCourses = Course::count();
        $totalCategories = Category::count();
        $totalInstructors = Instructor::count();
        $totalInstructors = Instructor::count();
        $totalTrails = Trail::count();

        if (isAdmin()){
          return view('backend.admin-home',compact('totalPupil','totalCategories','totalCourses','totalInstructors','totalTrails'));
        } else {
          return view('backend.home',compact('totalPupil','totalCategories','totalCourses','totalInstructors','totalTrails'));
        }

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
