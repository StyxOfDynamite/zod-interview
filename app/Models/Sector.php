<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    
    public function candidate()
    {
        return $this->belongsTo('App\Models\Candidate');
    }

}