<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Professeur extends Model
{
    protected $fillable = ['nom', 'prenoms', 'date_naissance', 'email', 'fonction', 'phone1', 'phone2', 'photo'];
}
