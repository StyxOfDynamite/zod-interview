<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alert extends Model
{
    
    
    /**
     * @return [Sector] the candidates selected sectors
     */
    public function sectors()
    {
        return $this->hasMany('App\Models\AlertSector');
    }

    /**
     * @return [Region] the candidates selected regions
     */
    public function regions()
    {
        return $this->hasManyThrough('App\Models\AlertRegion', 'App\Models\AlertCountry', 'country_id');

    }

    /**
     * @return [Country] the candidates selected country
     */
    public function country() {
        return $this->hasOne('App\Models\AlertCountry');
    }

    public function salary()
    {
        return $this->hasOne('App\Models\AlertSalary');
    }


}