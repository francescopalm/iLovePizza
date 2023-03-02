<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Association extends Model
{
    use HasFactory;

    /**
     * Relazione Molti-a-Molti che rappresenta gli utenti che appartengono all'associazione
     */
    public function users()   {
        return $this->belongsToMany(User::class)->withPivot('user_type');

    }
}
