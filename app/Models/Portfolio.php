<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Portfolio extends Model
{
    protected $fillable = ['user_id', 'title', 'description', 'image_url', 'project_url'];
    public function user(): BelongsTo { return $this->belongsTo(User::class); }
}