<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    /**
     * [$fillable array of entity attributes that can be mass assigned]
     * @var array
     */
    protected $fillable = array('sector', 'candidate_id');

    /**
     * [candidate returns the candidate that has selected this sector]
     * @return [Candidiate] [the candidate]
     */
    public function candidate()
    {
        return $this->belongsTo('App\Models\Candidate');
    }

}