<?php

namespace App\Models;

use App\Http\services\DefaultModelAttributesTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory;
    use SoftDeletes;
    use DefaultModelAttributesTrait;
    protected $guarded = [''];
    protected $appends=['name', 'description'];
    public $folder = 'services';
    protected $hidden = [

        'name_ar',
        'name_en',
        'description_ar',
        'description_en',
        'icon'
    ];

    public function getImage2Attribute($value){

        return $value?asset('dashboardAssets/images/'.$this->folder.'/'.$value):null;
    }

}
