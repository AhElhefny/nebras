<?php

namespace App\Http\services;

use App\Models\GeneralSetting;

trait HelperTrait
{

    public function storeImage($file,$folder){
        $file = $file;
        $filename = date('YmdHi').$file->getClientOriginalName();
        $file->move(public_path('dashboardAssets/images/'. $folder), $filename);
        return $filename;
    }

    public function storeImageByPath($file,$path){
        $file = $file;
        $filename = date('YmdHi').$file->getClientOriginalName();
        $file->move(public_path($path), $filename);
        return $filename;
    }


}
