<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Validator;
class UserApiController extends Controller
{
    public function showUser($id = null){
        if($id==''){
            $user = User::get();
            return response()->json(['users' => $user],200);
        }else{
            $user = User::find($id);
            return response()->json(['users' => $user],200);
        }
    }

    public function addUser(Request $request)
    {
        if($request->ismethod('post')){
            $data = $request->all();

            $rules = [
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required',
            ];

            $customMessage = [
                'name.required' => 'Name is required',
                'email.required' => 'Email is required',
                'email.email' => 'Email must be a valid email',
                'password.required' => 'Password is required',
            ];

            $validator = Validator::make($data, $rules, $customMessage);
            if($validator->fails()){
                return response()->json($validator->errors(),422);
            }

            $user = new User();
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->password = bcrypt($data['password']);

            $user->save();
            $message = 'Data Saved Successfully';
            return response()->json(['message' => $message], 201);
        }
    }
}
