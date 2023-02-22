<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\services\HelperTrait;
use App\Models\GeneralSetting;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    use HelperTrait;
    public function manage(){
        return view('dashboard.about_us');
    }

    public function settingStore(Request $request){

        foreach ($request->type as $index => $value){
            GeneralSetting::updateOrCreate(['key' => $index],['value' => $value]);
        }
        if ($request->hasFile('about_image')){
            $img_name = $this->storeImageByPath($request->file('about_image'),'frontAssets/images/about');
            GeneralSetting::updateOrCreate(['key' => 'about_image'],['value' => $img_name]);
        }
        return back()->with(['success',__('dashboard.item updated successfully')]);
    }
}
