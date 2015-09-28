<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlertCountry extends Model
{
    /**
     * [$table the database table that this model maps to]
     * @var string
     */
    protected $table = 'alert_countries';

    /**
     * [$fillable array of entiity properites that can be mass assigned]
     * @var array
     */
    protected $fillable = array('alert_id', 'country');

    /**
     * @return [Region] the regions that belongs to this country
     */
    public function regions()
    {
        return $this->hasMany('App\Models\AlertRegion');
    }

    /**
     * @return [Alert] the alert this country belongs to
     */
    public function alert()
    {
        return $this->belongsTo('App\Models\Alert');
    }
}