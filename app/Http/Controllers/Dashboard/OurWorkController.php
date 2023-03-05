<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\services\HelperTrait;
use App\Models\OurWork;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Yajra\DataTables\Facades\DataTables;

class OurWorkController extends Controller
{
    use HelperTrait;
    public function index()
    {
        $parents = OurWork::parents()->get();
        if (\request()->ajax()){
            return DataTables::of(OurWork::all())->make(true);
        }
        return view('dashboard.OurWorks.index',['parents' => $parents]);
    }

    public function store(Request $request)
    {

        $rules = [
            'image' => ['image','mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'parent' => ['nullable',Rule::exists('our_works','id')],
            'title_ar' => ['required','string','min:5'],
            'title_en' => ['required','string','min:5'],
        ];

        $validator = Validator::make($request->except(['_token']),$rules);
        if($validator->fails()){
            return back()->withInput()->withErrors($validator->errors());
        }

        $data = $request->except(['_token','image']);
        if($request->hasFile('image')){
            $data['image'] = $this->storeImageByPath($request->file('image'),'frontAssets/images/works');
        }
        OurWork::create($data);
        return redirect()->route('admin.works.index')->with(['success' => __('dashboard.item added successfully')]);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {

        $parents = OurWork::parents()->where('id','!=',$id)->get();
        $ourWork = OurWork::find($id);

        if (!$ourWork){
            return redirect()->route('admin.works.index')->with(['success' => __('dashboard.something went wrong')]);
        }
        return view('dashboard.OurWorks.index',['work' => $ourWork,'parents' => $parents]);
    }

    public function update(Request $request, $id)
    {
        $ourWork = OurWork::find($id);

        if (!$ourWork){
            return redirect()->route('admin.works.index')->with(['success' => __('dashboard.something went wrong')]);
        }
        $rules = [
            'image' => ['nullable','image'],
            'parent' => ['nullable',Rule::exists('our_works','id')],
            'title_ar' => ['required','string','min:5'],
            'title_en' => ['required','string','min:5'],
        ];

        $validator = Validator::make($request->except(['_token']),$rules);
        if($validator->fails()){
            return back()->withInput()->withErrors($validator->errors());
        }

        $data = $request->except(['_token','image']);
        if($request->hasFile('image')){
            $data['image'] = $this->storeImageByPath($request->file('image'),'frontAssets/images/works');
        }
        $ourWork->update($data);
        return redirect()->route('admin.works.index')->with(['success' => __('dashboard.item updated successfully')]);
    }

    public function destroy(OurWork $ourWork)
    {
        //
    }
}
