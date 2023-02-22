<?php

namespace App\Http\Controllers;
use App\Models\Group;
use App\Models\Media;
use App\Models\OurWork;
use App\Models\Service;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $services = Service::count();
        $works = OurWork::count();
        $media = Media::count();
        $groups = Group::count();
        return view('dashboard.index',[
            'services' => $services,
            'works' => $works,
            'media' => $media,
            'groups' => $groups,
        ]);
    }

//    private function getUsersCountLatestMonths(int $num):int {
//
//       return DB::table('users')
//            ->select('*')
//            ->where('type','=',0)
//            ->whereYear('users.created_at','=',Carbon::now()->subMonths($num)->format('Y'))
//            ->whereMonth('users.created_at','=',Carbon::now()->subMonths($num)->format('m'))
//            ->when(auth()->user()->type != User::ADMIN,function ($q){
//
//            })
//            ->count();
//    }
//
//    private function getOrdersCountLatestSevenDays(int $num):int {
//
//
//    }
}
