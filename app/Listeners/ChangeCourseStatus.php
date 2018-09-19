<?php

namespace App\Listeners;

use App\Events\CourseContentChanged;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ChangeCourseStatus
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  CourseContentChanged  $event
     * @return void
     */
    public function handle(CourseContentChanged $event)
    {
        if ($event->course->status!='E'){
          $event->course->status = 'E';
          $event->course->save();
          //dd($event->course);
          session()->flash('events',['O status do curso ['.$event->course->title.'] foi alterado para [EM ELABORAÇÃO]']);
        }
    }
}
