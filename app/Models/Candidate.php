<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    /**
     * @return [File] the candidates files.
     */
    public function files()
    {
        return $this->hasOne('App\Models\File');
    }
    
    /**
     * @return [Sector] the candidates selected sectors
     */
    public function sectors()
    {
        return $this->hasMany('App\Models\Sector');
    }

    /**
     * @return [Region] the candidates selected regions
     */
    public function regions()
    {
        return $this->hasManyThrough('App\Models\Region', 'App\Models\Country', 'country_id');

    }

    /**
     * @return [Country] the candidates selected country
     */
    public function country() {
        return $this->hasOne('App\Models\Country');
    }

    public function salary()
    {
        return $this->hasOne('App\Models\Salary');
    }

    /**
     * @return [Alerts] the alerts this candidate has configured
     */
    public function alerts()
    {
        return $this->hasMany('App\Models\Alert');
    }


}