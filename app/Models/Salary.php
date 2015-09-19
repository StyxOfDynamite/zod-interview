<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    /**
     * [$fillable array of entity attributes that can be mass assigned]
     * @var array
     */
    protected $fillable = array('candidate_id', 'currency', 'salary', 'interval');
    /**
     * [$table the table this object is mapped to in the database]
     * @var string
     */
    protected $table = 'salaries';

    /**
     * @return [Candidate] the candidate this file belongs to
     */
    public function candidate()
    {
        return $this->belongsTo('App\Models\Candidate');
    }
}