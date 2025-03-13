<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    // Entità dipendente
    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
