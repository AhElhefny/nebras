<?php

namespace App\Models;
use App\Http\services\DefaultModelAttributesTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    use DefaultModelAttributesTrait;

    protected $guarded = [''];
    protected $appends=['name', 'review','job'];
    public $folder ='reviews';

    protected $hidden = [

        'name_ar',
        'name_en',
        'review_ar',
        'review_en',
        'job_ar',
        'job_en'
    ];

    public function getReviewAttribute()
    {
        if (app()->getLocale() == 'ar') {

            return $this->review_ar;
        }
        
         return $this->review_en;
    }
   
}
