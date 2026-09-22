<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Enrollment extends Model
{
    protected $fillable = ['user_id', 'skill_id', 'progress', 'last_active_at'];
    protected $casts = ['last_active_at' => 'datetime'];
    public function skill(): BelongsTo { return $this->belongsTo(Skill::class); }
    public function user(): BelongsTo { return $this->belongsTo(User::class); }
}