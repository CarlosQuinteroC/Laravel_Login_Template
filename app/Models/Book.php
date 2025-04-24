<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{

    public function comments() {
        return $this->hasMany(Comment::class);
    }
    public function ratings() {
        return $this->hasMany(Rating::class);
    }


    // Relationship: A book belongs to a user (the poster/owner)
    public function poster()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Many-to-many relationship with users that are interested in the job
    public function interestedUsers()
    {
        return $this->belongsToMany(User::class, 'interests')->withTimestamps();
    }
}
