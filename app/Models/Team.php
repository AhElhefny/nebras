<?php

namespace App\Models;
use App\Http\services\DefaultModelAttributesTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Team extends Model
{
    use HasFactory;
    use DefaultModelAttributesTrait;

    protected $guarded = [''];
    protected $appends=['name', 'description','job'];
    public $folder ='teams';
    protected $hidden = [

        'name_ar',
        'name_en',
        'description_ar',
        'description_en',
        'job_en',
        'job_ar'
    ];

}
