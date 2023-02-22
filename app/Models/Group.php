<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $appends = ['title','description'];
    protected $guarded =[''];

    public function getTitleAttribute(){
        return app()->getLocale() == 'ar'? $this->title_ar:$this->title_en;
    }

    public function getDescriptionAttribute(){
        return app()->getLocale() == 'ar'? $this->description_ar:$this->description_en;
    }

    public function getCreatedAtAttribute($val)
    {
        return Carbon::parse($val)->diffForHumans();
    }

    public function getImageAttribute($val){
        return $val?asset('frontAssets/images/sponsors/'.$val):null;
    }
}
