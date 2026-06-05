<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AddClassToTerm extends Model
{
    protected $table = 'add_class_to_terms';

    protected $fillable = ['term_id', 'class_id'];

    public function term(): BelongsTo
    {
        return $this->belongsTo(Term::class);
    }

    public function classe(): BelongsTo
    {
        return $this->belongsTo(Classe::class, 'class_id');
    }
}
