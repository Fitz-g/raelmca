<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pays extends Model
{
    protected $fillable = ['name', 'alpha3'];

    /**
     * Get the members for the country.
     */
    public function members()
    {
        return $this->HasMany('App\Models\Member', 'pays_id');
    }
}
