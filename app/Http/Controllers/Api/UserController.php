<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Button;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends ApiResponseController
{
    public function verify(){
        $user = Auth::user();

        $user =  request()->user();

        return $this->responseApi($user->token()->id);
    }
}
