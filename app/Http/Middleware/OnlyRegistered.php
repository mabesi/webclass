<?php

namespace App\Http\Middleware;

use Closure;
use App\Course;
use App\Unity;
use App\Lesson;
use App\Courseware;
use App\Examination;
use App\Question;

class OnlyRegistered
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      $totalSegments = count($request->segments());

      if ($totalSegments > 1){

        $model = $request->segments()[0];
        $id = $request->segments()[1];

        $registered = false;
        $course = Null;

        if (is_numeric($id)){

          switch ($model) {
            case 'course':
              $course = Course::find($id);
              break;
            case 'unity':
              $course = Unity::find($id)->course;
              break;
            case 'courseware':
              $course = Courseware::find($id)->course;
              break;
            case 'lesson':
              $course = Lesson::find($id)->unity->course;
              break;
            case 'examination':
              $course = Examination::find($id)->unity->course;
              break;
            case 'question':
              $course = Question::find($id)->examination->unity->course;
              break;
          }

          if ($course==Null){
            return redirect('course');            
          } else {
            $registered = $course->registered(getUserid());

            if (!$registered && isNotAdmin()){
              return redirect('course/'.$course->id)->with('warnings', ['Acesso restrito aos inscritos no curso!']);
            }
          }

        }

      }

      return $next($request);
    }
}
