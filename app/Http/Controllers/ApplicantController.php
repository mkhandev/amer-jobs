<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\JobListing;
use Illuminate\Http\Request;

class ApplicantController extends Controller
{
    public function store(Request $request, JobListing $jobListing)
    {
        $existingApplication = Applicant::where('job_listing_id', $jobListing->id)
            ->where('user_id', auth()->id())
            ->exists();

        if ($existingApplication) {
            return redirect()->back()->with('error', 'You have already applied to this job');
        }

        // Validate incoming data
        $validatedData = $request->validate([
            'full_name' => 'required|string',
            'contact_phone' => 'string',
            'contact_email' => 'required|string|email',
            'message' => 'string',
            'location' => 'string',
            'resume' => 'required|file|mimes:pdf|max:2048',
        ]);

        if ($request->hasFile('resume')) {
            $path = $request->file('resume')->store('resumes', 'public');
            $validatedData["resume_path"] = $path;
        }

        $validatedData["user_id"] = auth()->id();
        $validatedData['job_listing_id'] = $jobListing->id;

        $jobListing->applicants()->create($validatedData);

        return redirect()->back()->with('success', 'Your application has been submitted');
    }

    public function destroy($id)
    {
        $applicant = Applicant::findOrFail($id);
        $applicant->delete();
        return redirect()->route('dashboard')->with('success', 'Applicant deleted successfully!');
    }
}
