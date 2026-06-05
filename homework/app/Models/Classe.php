<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\StudentClasse;
use App\Models\TeacherClassSubject;
use App\Models\AddClassToTerm;

class Classe extends Model
{
     protected $table = 'classes';

    protected $fillable = ['name', 'description'];

    public function teacherClassSubjects(): HasMany
    {
        return $this->hasMany(TeacherClassSubject::class, 'class_id');
    }

    public function studentClasses(): HasMany
    {
        return $this->hasMany(StudentClasse::class, 'class_id');
    }

    public function addClassToTerms(): HasMany
    {
        return $this->hasMany(AddClassToTerm::class, 'class_id');
    }
}
