<?php

namespace Database\Seeders;

use App\Models\JobListing;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookmarkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $testUser = User::where('email', 'test@test.com')->first();
        $jobIds = JobListing::pluck('id')->toArray();
        $randomJobIds = array_rand($jobIds, 5);

        foreach ($randomJobIds as $jobId) {
            $testUser->bookmarkedJobs()->syncWithoutDetaching($jobIds[$jobId]);
            //syncWithoutDetaching() duplicate bookmark will not add
        }
    }
}
