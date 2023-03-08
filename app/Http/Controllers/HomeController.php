<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Series;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $series = Series::take(4)->get();
        $featureCourses = Course::take(6)->get();
        // dd($series);
        return view('welcome', [
            'series' => $series,
            'courses' => $featureCourses
        ]);
    }
}