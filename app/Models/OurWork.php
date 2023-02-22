<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurWork extends Model
{
    use HasFactory;

    protected $guarded = [''];
    protected $appends = ['title'];

    public function getTitleAttribute(){
        return app()->getLocale() == 'ar' ? $this->title_ar:$this->title_en;
    }

    public function scopeParents($q){
        $q->whereNull('parent');
    }

    public function getCreatedAtAttribute($val){
        return Carbon::parse($val)->diffForHumans();
    }

    public function getImageAttribute($val){
        return $val? asset('frontAssets/images/works/'.$val):null;
    }

    public function getParentAttribute($val){
        $work =OurWork::find($val);
        return $val? [$work->title,$work->id]:__('dashboard.principle work');
    }
}
