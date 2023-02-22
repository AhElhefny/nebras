<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\services\HelperTrait;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class GroupController extends Controller
{
    use HelperTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(\request()->ajax()){

            return DataTables::of(Group::all())->make(true);
        }
        return view('dashboard.groups.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'link' => ['required','string'],
            'title_ar' => ['required','string'],
            'title_en' => ['required','string'],
            'description_ar' => ['required','string'],
            'description_en' => ['required','string'],
        ];

        $validator = Validator::make($request->except(['_token','image','active']),$rules);
        if($validator->fails()){
            return back()->withInput()->withErrors($validator->errors());
        }
        $data = $request->except(['_token','image','active']);

        if($request->hasFile('image')){
            $imageName = $this->storeImageByPath($request->file('image'),'frontAssets/images/sponsors');
            $data['image'] = $imageName;
        }
        $data['active'] = $request->active ? 1 : 0 ;

        Group::create($data);
        return back()->with(['success'=>__('dashboard.item added successfully')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
        return view('dashboard.groups.index',['group'=>$group]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group)
    {
        $rules = [
            'link' => ['required','string'],
            'title_ar' => ['required','string'],
            'title_en' => ['required','string'],
            'description_ar' => ['required','string'],
            'description_en' => ['required','string'],
        ];

        $validator = Validator::make($request->except(['_token','image','active']),$rules);
        if($validator->fails()){
            return back()->withInput()->withErrors($validator->errors());
        }
        $data = $request->except(['_token','image','active']);
        if($request->hasFile('image')){
            $imageName = $this->storeImageByPath($request->file('image'),'frontAssets/images/sponsors');
            $data['image'] = $imageName;
        }
        $data['active'] = $request->active ? 1 : 0 ;

        $group->update($data);
        return redirect()->route('admin.groups.index')->with(['success'=>__('dashboard.item updated successfully')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        $group->delete();
        return back()->with(['success'=>__('dashboard.item deleted successfully')]);
    }
}
