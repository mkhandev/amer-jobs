<?php

namespace App\Http\Controllers;

use App\Models\JobListing;
use Illuminate\Http\Request;

class JobListingController extends Controller
{
    public function index()
    {
        $jobs = JobListing::latest()->paginate(10);
        return view('jobs.index')->with('jobs', $jobs);
    }

    public function show(JobListing $job){
        return view('jobs.show', compact('job'));
    }
}
