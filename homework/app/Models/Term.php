<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Term extends Model
{
    protected $fillable = ['name', 'description', 'generation_id'];

    public function generation(): BelongsTo
    {
        return $this->belongsTo(Generation::class);
    }

    public function addClassToTerms(): HasMany
    {
        return $this->hasMany(AddClassToTerm::class, 'term_id');
    }
}
