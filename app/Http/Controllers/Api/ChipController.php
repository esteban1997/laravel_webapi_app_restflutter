<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Chip;
use App\Models\Group;
use Illuminate\Http\Request;

class ChipController extends ApiResponseController
{
    public function index(){
        $chips = Chip::leftJoin('behaviorals',function($join){
            $join->on('chips.id','=','behaviorals.behavioral_id')->where('behavioral_type','=','App\Models\Chip');
        })->paginate(15);
        return $this->responseApi($chips);
    }

    public function all(){
        $chips = Chip::leftJoin('behaviorals',function($join){
            $join->on('chips.id','=','behaviorals.behavioral_id')->where('behavioral_type','=','App\Models\Chip');
        })->get();

        return $this->responseApi($chips);
    }

    public function show(Chip $chips){
        $chips->behavior;
        return $this->responseApi($chips);
    }

    public function group(Group $group){
        return $this->responseApi(
            Chip::leftJoin('behaviorals',function($join){
            $join->on('chips.id','=','behaviorals.behavioral_id')
            ->where('behavioral_type','=','App\Models\Chip');
            })->where('group_id',$group->id)->get()
    );
    }
}
