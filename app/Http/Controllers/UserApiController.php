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

    public function addMultipleUser(Request $request)
    {
        if($request->ismethod('post')){
            $data = $request->all();

            $rules = [
                'users.*.name' => 'required',
                'users.*.email' => 'required|email|unique:users',
                'users.*.password' => 'required',
            ];

            $customMessage = [
                'users.*.name.required' => 'Name is required',
                'users.*.email.required' => 'Email is required',
                'users.*.email.email' => 'Email must be a valid email',
                'users.*.password.required' => 'Password is required',
            ];

            $validator = Validator::make($data, $rules, $customMessage);
            if($validator->fails()){
                return response()->json($validator->errors(),422);
            }

            foreach($data['users'] as $addUser){
                $user = new User();
                $user->name = $addUser['name'];
                $user->email = $addUser['email'];
                $user->password = bcrypt($addUser['password']);
                $user->save();
                $message = 'Data Saved Successfully';
            }
            return response()->json(['message' => $message], 201);
        }
    }

    public function updateUserDetails(Request $request,$id){
        if($request->isMethod('put')){
            $data = $request->all();

            $rules = [
                'name' => 'required',
                'email' => 'required|email|unique:users,email,'.$id,
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

            $user = User::findOrFail($id);
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->password = bcrypt($data['password']);

            $user->save();
            $message = 'Data Updated Successfully';
            return response()->json(['message' => $message], 202);
        }
    }

    public function updateSingleUserDetails(Request $request,$id){
        if($request->isMethod('patch')){
            $data = $request->all();

            $rules = [
                'name' => 'required',
            ];

            $customMessage = [
                'name.required' => 'Name is required',
            ];

            $validator = Validator::make($data, $rules, $customMessage);
            if($validator->fails()){
                return response()->json($validator->errors(),422);
            }

            $user = User::findOrFail($id);
            $user->name = $data['name'];
            $user->save();
            $message = 'Data Updated Successfully';
            return response()->json(['message' => $message], 202);
        }
    }
}
