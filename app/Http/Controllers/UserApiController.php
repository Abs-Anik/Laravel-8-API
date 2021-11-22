<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserApiController extends Controller
{
    public function ShowUser($id = null){
        if($id==''){
            $user = User::get();
            return response()->json(['users' => $user],200);
        }else{
            $user = User::find($id);
            return response()->json(['users' => $user],200);
        }
    }
}
