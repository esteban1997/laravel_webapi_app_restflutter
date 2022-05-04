<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Text;
use Illuminate\Http\Request;

class TextController extends ApiResponseController
{
    public function index(){
        $texts = Text::paginate(15);

        return $this->responseApi($texts);
    }

    public function all(){
        $texts = Text::get();

        return $this->responseApi($texts);
    }

    public function show(Text $text){
        return $this->responseApi($text);
    }

    public function group(Group $group){
        return $this->responseApi(Text::where('group_id',$group->id)->get());
    }
}
