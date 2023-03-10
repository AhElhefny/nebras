<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use App\Http\services\HelperTrait;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    use HelperTrait;

    public function index(){

        return view('dashboard.auth_login_2');
        // return view('dashboard.auth-login');
    }

    public function login(Request $request){

        $rules=[
            'email' => ['required','email',Rule::exists('users','email')],
            'password' => ['required', 'min:6' ,'max:100']
        ];

        $messages_ar = [
            'required' => 'هذا الحقل لا يجب ان يكون فارغ',
            'email' => 'يجب ان يكون الحقل من نوع بريد الكتروني',
            'email.exists' => 'هذا البريد غير موجود',
            'min' => 'لا يجب ان يقل  الرقم السري عن 6 احرف',
            'max' => 'لا يجب ان يزيد  الرقم السري عن 100 حرف'
        ];

        $messages = (app()->getLocale() == 'ar' )? $messages_ar : [];

        $validator = Validator::make($request->all(),$rules, $messages);

        if($validator->fails()){
            return back()->withErrors($validator);
        }
        if(auth('web')->attempt($validator->validated())){
            if(!in_array(auth('web')->user()->type,[User::ADMIN])){
                auth('web')->logout();
                abort(403);
            }
            session()->regenerate();
            return redirect()->route('admin.home')->with('alert','hello');
        }
        return back()->with(['error'=>__('dashboard.email or password or both are wrong')]);
    }

    public function logout(){
        Auth::logout();
        return redirect()-> route('admin.login');
    }

    public function profile(){
        $user = User::find(\auth()->user()->id);
        return view('dashboard.user_profile',['user'=>$user]);
    }
    public function update_profile(CustomerRequest $request){
        $user = User::find(\auth()->user()->id);
        $data =$request->except(['_token','latitude','longitude','password']);
        if ($request->hasFile('image')){
            $data['image'] = $this->storeImage($request->file('image'),'users/'.$user->selecetFolder($user->type));
        }
        if($request->latitude)
            $data['latitude'] = $request->latitude;
        if($request->longitude)
            $data['longitude'] = $request->longitude;
        if($request->password)
            $data['password'] = bcrypt($request->password);

        $user->update($data);
        return back()->with(['success'=>__('dashboard.item updated successfully')]);
    }


}
