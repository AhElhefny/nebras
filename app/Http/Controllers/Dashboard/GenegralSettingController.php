<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class GenegralSettingController extends Controller
{
    public function generalSettings(){
        return view('dashboard.general_settings');
    }

    public function store(Request $request){
        if($request->has('generalSettings')){
            $rules = [
              'type.website_name_ar' => ['required','min:5','max:100'],
              'type.website_name_en' => ['required','min:5','max:100'],
              'type.contact_number'=> ['required','min:9','max:12'],
              'copyright' => ['required','min:10'],
              'logo1' => [Rule::requiredIf(!GeneralSetting::getValueForKey('logo1')),'image'],
              'logo2' => [Rule::requiredIf(!GeneralSetting::getValueForKey('logo2')),'image'],
            ];

            $validator = Validator::make($request->all(),$rules);
            if ($validator->fails()){
                return back()->withInput()->withErrors($validator->errors());
            }
            foreach ($request->type as $index => $value){
                GeneralSetting::updateOrCreate(['key' => $index],['value' => $value]);
            }
            if ($request->copyright){
                GeneralSetting::updateOrCreate(['key' => 'copyright'],['value' => $request->copyright]);
            }
            if ($request->hasFile('logo1')){
                $file = $request->file('logo1');
                $filename = '01_logo.'.$file->getClientOriginalExtension();
                $file->move(public_path('frontAssets/images/logo'), $filename);
                GeneralSetting::updateOrCreate(['key' => 'logo1'],['value' => $filename]);
            }

            if ($request->hasFile('logo2')){
                $file = $request->file('logo2');
                $filename = '02_logo.'.$file->getClientOriginalExtension();
                $file->move(public_path('frontAssets/images/logo'), $filename);
                GeneralSetting::updateOrCreate(['key' => 'logo2'],['value' => $filename]);
            }

        }

        if ($request->has('navbar') || $request->has('titles')){
            $rules = [
              'type.*' => $request->navbar?['required','min:3','max:15']:['required','min:3','max:100'],
            ];
            $validator = Validator::make($request->all(),$rules);

            if ($validator->fails()){
                return back()->withInput()->withErrors($validator->errors());
            }
            foreach ($request->type as $index => $value){
                GeneralSetting::updateOrCreate(['key' => $index],['value' => $value]);
            }
        }

        if ($request->has('background')){
//            $regex = '/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$=/';
            $rules = [
                'video_link' => ['required','string'],//,'regex:'.$regex
                'preview_background3' => [Rule::requiredIf(GeneralSetting::getValueForKey('preview_background3') == null),'image'],
                'video_background4' => [Rule::requiredIf(GeneralSetting::getValueForKey('video_background4') == null),'image'],
            ];
            $validator = Validator::make($request->all(),$rules);

            if ($validator->fails()){
                return back()->withInput()->withErrors($validator->errors());
            }
            GeneralSetting::updateOrCreate(['key' => 'video_link'],['value' => $request->video_link]);

            if ($request->hasFile('preview_background3')){
                $file = $request->file('preview_background3');
                $filename = '00_reviews.'.$file->getClientOriginalExtension();
                $file->move(public_path('frontAssets/images/reviews'), $filename);
                GeneralSetting::updateOrCreate(['key' => 'preview_background3'],['value' => $filename]);
            }

            if ($request->hasFile('video_background4')){
                $file = $request->file('video_background4');
                $filename = '01_video.'.$file->getClientOriginalExtension();
                $file->move(public_path('frontAssets/images/video'), $filename);
                GeneralSetting::updateOrCreate(['key' => 'video_background4'],['value' => $filename]);
            }
        }

        return back()->with(['success' => __('dashboard.item updated successfully')]);
    }
}
