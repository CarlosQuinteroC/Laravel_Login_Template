<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;



class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
// Many-to-Many: A user can be interested in many books.
    public function interestedBooks()
    {
        return $this->belongsToMany(Book::class, 'interest')->withTimestamps();
    }

    // A user (Admin) can have many created books.
    public function books()
    {
        return $this->hasMany(Book::class);
    }
    // has many create comments
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    // has many create ratings
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

// Many-to-Many: A user can be interested in many jobs.
    public function interestedJobs()
    {
        return $this->belongsToMany(Job::class, 'interests')->withTimestamps();
    }

    public function isAdmin()
    {
        return $this->is_admin; // ← Return the value of the is_admin field
    }
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
