<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Structure extends Model
{
    protected $fillable = ['name'];

    /**
     * Get the adherants for the structure.
     */
    public function members()
    {
        return $this->belongsToMany('App\Models\Member', 'member_structure')->withTimestamps();
    }
}
