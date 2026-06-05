<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\StudentClasse;
class Student extends Model
{
       protected $fillable = [
        'student_id',
        'profile',
        'last_name',
        'first_name',
        'gender',
        'email',
        'password',
        'province',
        'generation_id',
    ];

    protected $hidden = ['password'];

    public function generation(): BelongsTo
    {
        return $this->belongsTo(Generation::class);
    }

    public function studentClasses(): HasMany
    {
        return $this->hasMany(StudentClasse::class);
    }
}
