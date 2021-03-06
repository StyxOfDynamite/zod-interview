<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlertRegion extends Model
{
    /**
     * [$fillable array of entity attributes that can be mass assigned]
     * @var array
     */
    protected $fillable = array('alert_country_id', 'region');

    /**
     * @return [Country] the country this region belongs to
     */
    public function country()
    {
        return $this->belongsTo('App\Models\AlertCountry');
    }
}