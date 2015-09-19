<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    /**
     * [$table the database table that this model maps to]
     * @var string
     */
    protected $table = 'countries';

    /**
     * [$fillable array of entiity properites that can be mass assigned]
     * @var array
     */
    protected $fillable = array('candidate_id', 'country');

    /**
     * @return [Region] the regions that belongs to this country
     */
    public function regions()
    {
        return $this->hasMany('App\Models\Region');
    }

    /**
     * @return [Candidate] the candidate this country belongs to
     */
    public function candidate()
    {
        return $this->belongsTo('App\Models\Candidate');
    }
}