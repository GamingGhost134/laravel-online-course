<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function courselist()
    {
        $couse = Course::all();
        return view('courses.course_list',['courses'=>$couse]);
    }
}
