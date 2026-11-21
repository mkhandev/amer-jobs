<?php

namespace App\Http\Controllers;

use App\Models\JobListing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Util\PHP\Job;

class BookmarkController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $bookmarks = $user->bookmarkedJobs()->orderBy('job_user_bookmarks.created_at', 'desc')->paginate(9);
        return view('jobs.bookmarked')->with('bookmarks', $bookmarks);
    }

    public function store(JobListing $jobListing)
    {
        $user = auth::user();

        if ($user->bookmarkedJobs()->where('job_listing_id', $jobListing->id)->exists()) {
            return back()->with('error', 'Job is already bookmarked');
        }

        $user->bookmarkedJobs()->attach($jobListing->id);

        return back()->with('success', 'Job bookmarked successfully!');
    }

    public function destroy(JobListing $jobListing)
    {
        $user = auth::user();

        if (!$user->bookmarkedJobs()->where('job_listing_id', $jobListing->id)->exists()) {
            return back()->with('error', 'Job is not bookmarked');
        }

        $user->bookmarkedJobs()->detach($jobListing->id);

        return back()->with('success', 'Bookmark removed successfully!');
    }
}
