<?php

namespace App\Http\Controllers\Api;

use App\Models\Button;
use App\Models\Chip;
use App\Models\Group;
use App\Models\Image;
use App\Models\Mix;
use App\Models\Text;

class MixController extends ApiResponseController
{
    public function show(Group $group){

        $data = [];


        $mixs = Mix::where('group_id',$group->id)->orderBy('orden','ASC')->get();

        foreach ($mixs as $key => $m) {
            switch ($m->widget) {
                case 'button':
                    $o = Button::leftJoin('behaviorals',function($join){
                        $join->on('buttons.id','=','behaviorals.behavioral_id')->where('behavioral_type','=','App\Models\Button');
                    })->find($m->widget_id);
                    break;
                case 'image':
                    $o = Image::leftJoin('behaviorals',function($join){
                        $join->on('images.id','=','behaviorals.behavioral_id')->where('behavioral_type','=','App\Models\Image');
                    })->find($m->widget_id);
                    break;
                case 'text':
                    $o = Text::find($m->widget_id);
                    break;
                case 'chip':
                    $o = Chip::leftJoin('behaviorals',function($join){
                        $join->on('chips.id','=','behaviorals.behavioral_id')->where('behavioral_type','=','App\Models\Chip');
                    })->find($m->widget_id);
                    break;

            }
            $o->widget = $m->widget;
            $data[] =  $o;
        }

        return $this->responseApi($data);
    }
}
