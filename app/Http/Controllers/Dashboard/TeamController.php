<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Models\User;
use App\Http\services\HelperTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class TeamController extends Controller
{
    
    use HelperTrait;
    
    public function index()
    {
    
       if (\request()->ajax()) {

           $teams =Team::get();

           return DataTables::of($teams)->make(true);
       }

        return view('dashboard.team.index');
    }

    public function create()
    {

        return view('dashboard.team.create');

    }

    public function store(Request $request)
    {
       
        $data = $request->except(['_token']);

        if($request->file('image')){

            $data['image'] = $this->storeImage($request->file('image'),'teams');
        }
        
        $team = Team::create($data);
    
        return redirect()->route('admin.teams.index')->with(['success'=>__('dashboard.item added successfully')]);
        
    }

    public function edit(Team $team)
    {
       
        return view('dashboard.team.edit',['team' => $team]);

    }
  
    public function update(Request $request,Team $team)
    {
        
         $data = $request->except(['_token']);

         if ($request->hasFile('image')){

             $data['image'] = $this->storeImage($request->file('image'),$team->folder);
         }

         $team->update($data);

         return redirect()->route('admin.teams.index')->with(['success'=>__('dashboard.item updated successfully')]);
    }

    public function destroy(Team $team)
    {

        $team->delete();

        return back()->with(['success'=>__('dashboard.item deleted successfully')]);
    }

}
