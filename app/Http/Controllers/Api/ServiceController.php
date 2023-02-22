<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ServiceResource;
use App\Http\services\ApiResponseTrait;
use App\Models\Branch;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    use ApiResponseTrait;
    public function index(Request $request){

        $request->merge(['with_available'=>true]);

        $branch = Branch::find($request->branch_id);
        if(!$branch){
            return $this->ApiResponse(false,__('api.no such this data'),401);
        }
        $query = $branch->services;
        if($request->subCategory){
            $query = $query->where('vendor_category_id',$request->subCategory);
        }
       
        return $this->ApiResponse(true,__('api.data retrieved successfully'),200,ServiceResource::collection($query));
    }

    public function show(Service $service){
        return $this->ApiResponse(true,__('api.data retrieved successfully'),200,new ServiceResource($service));
    }
}
