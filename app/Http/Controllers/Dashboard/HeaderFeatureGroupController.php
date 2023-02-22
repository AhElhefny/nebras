<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\services\HelperTrait;
use App\Models\GeneralSetting;
use Illuminate\Http\Request;

class HeaderFeatureGroupController extends Controller
{
    use HelperTrait;
    public function manageSlider(){
        return view('dashboard.header.slider');
    }

    public function storeSlider(Request $request){
        foreach ($request->type as $index => $value){
            GeneralSetting::updateOrCreate(['key' => $index],['value' => $value]);
        }
        for ($i = 1; $i <= 3 ; $i++){
            if($request->hasFile('slider'.$i)){
                $sliderName = $this->storeImageByPath($request->file('slider'.$i),'frontAssets/images/header');
                GeneralSetting::updateOrCreate(['key' => 'slider'.$i],['value' => $sliderName]);
            }
        }
        return back()->with(['success' => __('dashboard.item updated successfully')]);
    }

    public function manageFeature(){
        return view('dashboard.header.feature');
    }

    public function storeFeature(Request $request){
        foreach ($request->type as $index => $value){
            GeneralSetting::updateOrCreate(['key' => $index],['value' => $value]);
        }
        return back()->with(['success' => __('dashboard.item updated successfully')]);
    }
}
