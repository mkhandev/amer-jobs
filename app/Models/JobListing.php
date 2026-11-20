<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobListing extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function user()
    {
        $this->belongsTo(User::class);
    }

    public function bookMarkedByUsers()
    {
        return $this->belongsToMany(User::class, 'job_user_bookmarks', 'job_listing_id', 'user_id')->withTimestamps();
    }
}
