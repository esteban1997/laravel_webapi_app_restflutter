<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends ApiResponseController
{
    public function index(){
        $images = Image::leftJoin('behaviorals',function($join){
            $join->on('images.id','=','behaviorals.behavioral_id')->where('behavioral_type','=','App\Models\Image');
        })->paginate(15);

        return $this->responseApi($images);
    }

    public function all(){
        $images = Image::leftJoin('behaviorals',function($join){
            $join->on('images.id','=','behaviorals.behavioral_id')->where('behavioral_type','=','App\Models\Image');
        })->get();

        return $this->responseApi($images);
    }

    public function show(Image $image){
        $image->behavior;
        return $this->responseApi($image);
    }

    public function group(Group $group){
        return $this->responseApi(
            Image::leftJoin('behaviorals',function($join){
            $join->on('images.id','=','behaviorals.behavioral_id')
            ->where('behavioral_type','=','App\Models\Image');
            })->where('group_id',$group->id)->get());
    }
}
