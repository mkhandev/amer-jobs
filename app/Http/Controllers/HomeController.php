<?php

namespace App\Http\Controllers;

use App\Models\JobListing;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $jobs = JobListing::latest()->limit(6)->get();
        return view('pages.index')->with('jobs', $jobs);
    }
}
