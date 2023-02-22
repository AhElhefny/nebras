<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\User;
use App\Http\services\HelperTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class CustomerReviewController extends Controller
{

    use HelperTrait;

    public function index()
    {

       if (\request()->ajax()) {

           $reviews = Review::get();

           return DataTables::of($reviews)->make(true);
       }

        return view('dashboard.review.index');
    }

    public function create()
    {

        return view('dashboard.review.create');

    }

    public function store(Request $request)
    {

        $data = $request->except(['_token']);

        if($request->file('image')){

            $data['image'] = $this->storeImage($request->file('image'),'reviews');
        }

        $review = Review::create($data);

        return redirect()->route('admin.review.index')->with(['success'=>__('dashboard.item added successfully')]);

    }

    public function edit(Review $review)
    {

        return view('dashboard.review.edit',compact('review'));

    }

    public function update(Request $request ,Review  $review)
    {

        $data = $request->except(['_token']);

        if($request->hasFile('image')){

            $data['image'] = $this->storeImage($request->file('image'),$review->folder);
        }

        $review->update($data);

         return redirect()->route('admin.review.index')->with(['success'=>__('dashboard.item updated successfully')]);
    }

    public function destroy(Review $review)
    {

        $review->delete();

        return back()->with(['success'=>__('dashboard.item deleted successfully')]);

    }

}
