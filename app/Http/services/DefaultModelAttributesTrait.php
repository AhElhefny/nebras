<?php

namespace App\Http\services;

use Carbon\Carbon;

trait DefaultModelAttributesTrait
{

    public function getImageAttribute($value){

        return $value?asset('dashboardAssets/images/'.$this->folder.'/'.$value):null;
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->diffForHumans();
    }

    public function getNameAttribute(){

        if(app()->getLocale()=='ar'){

            return $this->name_ar;
        }

        return $this->name_en;
    }

    public function getDescriptionAttribute()
    {
        if (app()->getLocale() == 'ar') {

            return $this->description_ar;
        }

        return $this->description_en;
    }

    public function getJobAttribute()
    {
        if (app()->getLocale() == 'ar') {

            return $this->job_ar;
        }

         return $this->job_en;
    }
}
