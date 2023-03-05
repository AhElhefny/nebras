<?php

namespace App\Http\Controllers\Frontend;
use App\Models\Group;
use App\Models\OurWork;
use App\Models\Service;
use App\Models\Team;
use App\Models\Review;
use App\Models\Media;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NebrasHomeController extends Controller
{

    public function index(){

        $services = Service::take(6)->get();
        $services_ids = Service::take(6)->pluck('id');
        $servicesmore = Service::whereNotIn('id',$services_ids)->get();
        $groups = Group::where('active',1)->get();
        $teams =Team::take(4)->get();
        $works = OurWork::parents()->take(2)->get();
        $mediacenters = Media::take(6)->get();
        $media_ids =Media::take(6)->pluck('id');
        $mediamore = Media::whereNotIn('id',$media_ids)->get();
        $websiteReviews = Review::whereNull('service_id')->get();

        return view('front.index',compact('services','servicesmore','teams','groups','works','mediacenters','mediamore','websiteReviews'));

    }

    public function services(){

        $services = Service::take(6)->get();
        $services_ids = Service::take(6)->pluck('id');
        $servicesmore = Service::whereNotIn('id',$services_ids)->get();

        return view('front.services',['services'=>$services ,'servicesmore'=>$servicesmore ]);

    }

    public function serviceDetails($id){
        $service = Service::find($id);
        if (!$service){
            return back()->with(['success'=>__('dashboard.something went wrong')]);
        }
        $serviceReviews = Review::where('service_id',$service->id)->get();
        return view('front.services-details',['service' => $service,'serviceReviews' => $serviceReviews]);
    }

    public function team(){

        $teams =Team::get();

        return view('front.team',['teams'=>$teams]);

    }

    public function teamDetails($id){

        $data=[];
        $data['teams']=Team::get();
        $data['team']=Team::find($id);

        return view('front.team-details',$data);
    }

    public function media(){

        $data=[];
        $data['mediacenters'] = Media::take(6)->get();
        $media_ids =Media::take(6)->pluck('id');
        $data['mediamore'] = Media::whereNotIn('id',$media_ids)->get();

        return view('front.media',$data);

    }

    public function works(){
        $works = OurWork::parents()->get();
        return view('front.works',['works' => $works]);
    }

    public function workDetails($id){
        if(!OurWork::find($id)){
            return redirect()->route('/')->with(['success'=>__('dashboard.something went wrong')]);
        }
        $works = OurWork::where('parent',$id)->get();
        if(\request('all')){
            $works = OurWork::where('parent',$id)->get();
            return response()->json($works);
        }
        return view('front.work-details',['works' => $works->take(5),'id' => $id,'count' => $works->count()]);
    }

    public function group(){
        $groups = Group::all();
        return view('front.group',['groups'=>$groups]);
    }

}
