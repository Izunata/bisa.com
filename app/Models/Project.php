<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    protected $fillable = ['skill_id', 'title', 'brief', 'difficulty', 'estimated_hours'];
    public function skill(): BelongsTo { return $this->belongsTo(Skill::class); }
    public function submissions(): HasMany { return $this->hasMany(ProjectSubmission::class); }
}