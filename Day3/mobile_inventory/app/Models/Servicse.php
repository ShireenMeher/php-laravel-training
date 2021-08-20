<?php

namespace App\Models;

use App\Http\Requests\createUserRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Service extends Model
{
    public function createUser(createUserRequest $request){

        $user = Users::create(['name'=>$request->name, 'phoneNo'=>$request->phoneNo, 'email' =>$request->email]);

        return response()->json([
            "user" => $user,
            "msg" => "User $request->name is created successfully!"
        ], 201);
    }

    public function getUserByName($username){

        if (Users::where('name', $username)->exists()) {
            $user = Users::where('name', $username)->get();
            return response($user, 200);
        } else {
            return response()->json([
                "message" => "Username doesn't exist!"
            ], 404);
        }

    }

    public function getUsersByEmail($e_mail){

        if (Users::where('email', $e_mail)->exists()) {
            $user = Users::where('email', $e_mail)->get();
            return response()->json(["user" => $user], 200);
        } else {
            return response()->json([
                "message" => "User email doesn't exist!"
            ], 404);
        }
    }

    public function getUserByPhoneNo($phone_no){

        if (Users::where('phoneNo', $phone_no)->exists()) {
            $user = Users::where('phoneNo', $phone_no)->get();
            return response($user, 200);
        } else {
            return response()->json([
                "message" => "Phone number doesn't exist!"
            ], 404);
        }
    }



    public function getAllUsers(){
        $users = Users::get();
        return response($users, 200);
    }

    public function deleteUserByPhoneNo($phone_number){
        if(Users::where('phoneNo', $phone_number)->exists()){
            DB::table('users')->where('phoneNo',$phone_number)->delete();
            return response()->json([
                "message" => "User successfully deleted!"
            ], 202);
        } else {
            return response()->json([
                "message" => "Phone number doesn't exist!!"
            ], 404);
        }

    }

    public function deleteUserByName($username){
        if(Users::where('name', $username)->exists()){
            DB::table('users')->where('name',$username)->delete();
            return response()->json([
                "message" => "User successfully deleted!"
            ], 202);
        } else {
            return response()->json([
                "message" => "User name doesn't exist!!"
            ], 404);
        }

    }

    public function deleteUserByEmail($email){
        if(Users::where('email', $email)->exists()){
            DB::table('users')->where('email',$email)->delete();
            return response()->json([
                "message" => "User successfully deleted!"
            ], 202);
        } else {
            return response()->json([
                "message" => "User email doesn't exist!!"
            ], 404);
        }

    }
}
