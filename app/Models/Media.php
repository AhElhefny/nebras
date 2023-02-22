<?php

namespace App\Models;
use App\Http\services\DefaultModelAttributesTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;
    use DefaultModelAttributesTrait;

    protected $guarded = [''];
    protected $appends=['name'];
    public $folder ='media';
    protected $hidden = [

        'name_ar',
        'name_en'
    ];

}
