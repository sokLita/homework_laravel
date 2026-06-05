<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubjectClasse extends Model
{
    protected $table = 'student_classes';

    protected $fillable = ['class_id', 'student_id'];

    public function classes(): BelongsTo
    {
        return $this->belongsTo(Classe::class, 'class_id');
    }

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
}
