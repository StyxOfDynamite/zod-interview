<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    /**
     * [$fillable array of entity properties that can be mass assigned]
     * @var array
     */
    protected $fillable = array('candidate_id', 'file');
    /**
     * @return [Candidate] the candidate this file belongs to
     */
    public function candidate()
    {
        return $this->belongsTo('App\Models\Candidate');
    }
}