<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
        'nom', 'prenoms', 'date_naissance', 'fonction', 'phone1', 'phone2', 'email', 'cv', 'photo', 'pays_id'
    ];

    /**
     * Get the structures for the members.
     */
    public function structures()
    {
        return $this->belongsToMany('App\Models\Structure', 'member_structure')->withTimestamps();
    }

    /**
     * Get the country for the members.
     */
    public function pays()
    {
        return $this->belongsTo('App\Models\Pays', 'pays_id');
    }
}
