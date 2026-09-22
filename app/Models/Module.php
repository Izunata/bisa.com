<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Module extends Model
{
    protected $fillable = ['skill_id', 'title', 'description', 'position'];
    public function skill(): BelongsTo { return $this->belongsTo(Skill::class); }
    public function lessons(): HasMany { return $this->hasMany(Lesson::class); }
}