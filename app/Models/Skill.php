<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Skill extends Model
{
    protected $fillable = ['name', 'slug', 'category', 'description', 'level', 'color', 'estimated_hours', 'learners_count'];

    public function modules(): HasMany { return $this->hasMany(Module::class); }
    public function projects(): HasMany { return $this->hasMany(Project::class); }
    public function enrollments(): HasMany { return $this->hasMany(Enrollment::class); }
}