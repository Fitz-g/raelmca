<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Adherant extends Model
{
    protected $fillable = [
        'nom', 'prenoms', 'date_naissance', 'fonction', 'phone1', 'phone2', 'email', 'cv', 'photo', 'pays_id'
    ];
    /**
     * Get the Structutre that owns the adherants.
     */
    public function post()
    {
        return $this->belongsTo('App\Models\Structure', 'adherant_structure')->withTimestamps();
    }
}
