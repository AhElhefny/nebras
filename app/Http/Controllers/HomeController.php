<?php

namespace App\Http\Controllers;
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

        $authUser =auth()->user();
        $users = User::where('type',0)
            ->when($authUser->type != User::ADMIN,function ($q)use ($authUser){

        })->get();

//        $usersCount['LastMonth'] = $this->getUsersCountLatestMonths(1);
//        $usersCount['LatestTowMonth'] = $this->getUsersCountLatestMonths(2);
//        $usersCount['LatestThreeMonth'] = $this->getUsersCountLatestMonths(3);
//        $usersCount['LatestFourMonth'] = $this->getUsersCountLatestMonths(4);


        return view('dashboard.index',[

            'users' => $users,
//            'usersCountLatestFourMonth' => $usersCount,
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
