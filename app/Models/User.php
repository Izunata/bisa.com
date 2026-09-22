<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['name', 'email', 'password', 'avatar_url'];
    protected $hidden = ['password', 'remember_token'];
    protected $casts = ['email_verified_at' => 'datetime', 'password' => 'hashed'];

    public function enrollments() { return $this->hasMany(Enrollment::class); }
    public function submissions() { return $this->hasMany(ProjectSubmission::class); }
    public function portfolios() { return $this->hasMany(Portfolio::class); }
}