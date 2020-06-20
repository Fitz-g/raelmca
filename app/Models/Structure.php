<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Structure extends Model
{
    protected $fillable = ['name'];

    /**
     * Get the adherants for the structure.
     */
    public function adherants()
    {
        return $this->hasMany('App\Models\Adherant', 'adherant_structure')->withTimestamps();
    }
}
