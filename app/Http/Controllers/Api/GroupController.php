<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends ApiResponseController
{
    public function index(){
        $groups = Group::paginate(15);

        return $this->responseApi($groups);
    }

    public function all(){
        $groups = Group::get();

        return $this->responseApi($groups);
    }

    public function show(Group $group){
        return $this->responseApi($group);
    }
}
