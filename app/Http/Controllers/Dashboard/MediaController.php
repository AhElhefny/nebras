<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\services\HelperTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Media;


class MediaController extends Controller
{

    use HelperTrait;

    public function index()
    {

        if (\request()->ajax()){

            $media = Media::all();

            return DataTables::of($media)->make(true);
        }

         return view('dashboard.media.index');
    }

    public function create()
    {

        return view('dashboard.media.create');

    }

    public function store(Request $request)
    {

        $rules = [
            'image' => ['required','image']
        ];

        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return back()->withInput()->withErrors($validator->errors());
        }
        $data = $request->except(['_token']);

        if($request->file('image')){

            $data['image'] = $this->storeImage($request->file('image'),'media');
        }

        Media::create($data);

        return redirect()->route('admin.media.index')->with(['success'=>__('dashboard.item updated successfully')]);

    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {

        $data= Media::find($id);

        return view('dashboard.media.edit',compact('data'));

    }

    public function update(Request $request, Media $media)
    {

        $rules = [
            'name_ar' => ['required','min:5'],
            'name_en' => ['required','min:100'],
        ];

        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return back()->withInput()->withErrors($validator->errors());
        }
        $data = $request->except(['_token']);

        if ($request->hasFile('image')){

              $data['image'] = $this->storeImage($request->file('image'),$media->folder);
         }

         $media->update($data);

         return redirect()->route('admin.media.index')->with(['success'=>__('dashboard.item updated successfully')]);
    }

    public function destroy(Media $media)
    {

        $media->delete();

        return back()->with(['success'=>__('dashboard.item deleted successfully')]);
    }


}
