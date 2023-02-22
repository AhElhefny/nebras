<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use App\Models\Service;
use App\Models\User;
use App\Http\services\HelperTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class ServiceController extends Controller
{
    use HelperTrait;

    public function __construct()
    {
        $this->middleware('permission:services',['only'=>['index']]);
        $this->middleware('permission:add service',['only'=>['create','store']]);
        $this->middleware('permission:edit service',['only'=>['edit','update']]);
        $this->middleware('permission:delete service',['only'=>['destroy']]);
        $this->middleware('permission:show service',['only'=>['show']]);
    }

    public function index()
    {

       if (\request()->ajax()) {

           $services= Service::get();

           return DataTables::of($services)->make(true);
       }

        return view('dashboard.services.list');
    }

    public function create()
    {

        return view('dashboard.services.create');
    }

    public function store(ServiceRequest $request)
    {

        $data = $request->except(['_token']);

        if($request->file('image')){

            $data['image'] = $this->storeImage($request->file('image'),'services');
        }

        if($request->file('image2')){

            $data['image2'] = $this->storeImage($request->file('image2'),'services');
        }

        $service = Service::create($data);

        return redirect()->route('admin.services.index')->with(['success' => __('dashboard.item added successfully')]);

    }

    public function show(Service $service)
    {

        return view('dashboard.services.show',['service'=>$service]);
    }

    public function edit(Service $service)
    {

        return view('dashboard.services.edit',['service'=>$service]);

    }

    public function update(ServiceRequest $request, Service $service)
    {

         $data = $request->except(['_token']);

         if ($request->hasFile('image')){

             $data['image'] = $this->storeImage($request->file('image'),$service->folder);
         }

         if($request->file('image2')){

             $data['image2'] = $this->storeImage($request->file('image2'),$service->folder);
         }

         $service->update($data);

         return redirect()->route('admin.services.index')->with(['success'=>__('dashboard.item updated successfully')]);
    }

    public function destroy(Service $service)
    {

        $service->delete();

        return back()->with(['success'=>__('dashboard.item deleted successfully')]);
    }

}
