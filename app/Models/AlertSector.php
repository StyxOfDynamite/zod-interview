<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlertSector extends Model
{
    /**
     * [$fillable array of entity attributes that can be mass assigned]
     * @var array
     */
    protected $fillable = array('sector', 'alert_id');

    /**
     * [alert returns the alert that has selected this sector]
     * @return [Candidiate] [the alert]
     */
    public function alert()
    {
        return $this->belongsTo('App\Models\Alert');
    }

}