<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UsersController extends Controller
{
    //
    public function createUser(Request $request){

        $users = DB::table('users')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'phoneNo' => $request->phoneNo,
        ]);

        return response()->json([
            "msg"=>"User $request->name is created successfully!\n"
        ], 201);


    }


    public function getUserByName($username){

        if (Users::where('name', $username)->exists()) {
            $user = Users::where('name', $username)->get()->toJson(JSON_PRETTY_PRINT);
            return response($user, 200);
        } else {
            return response()->json([
                "message" => "Username doesn't exist!"
            ], 404);
        }

    }

    public function getUsersByEmail($e_mail){

        if (Users::where('email', $e_mail)->exists()) {
            $user = Users::where('email', $e_mail)->get()->toJson(JSON_PRETTY_PRINT);
            return response($user, 200);
        } else {
            return response()->json([
                "message" => "User email doesn't exist!"
            ], 404);
        }
    }

    public function getUserByPhoneNo($phone_no){

        if (Users::where('phoneNo', $phone_no)->exists()) {
            $user = Users::where('phoneNo', $phone_no)->get()->toJson(JSON_PRETTY_PRINT);
            return response($user, 200);
        } else {
            return response()->json([
                "message" => "Phone number doesn't exist!"
            ], 404);
        }
    }



    public function getAllUsers(){
        $users = Users::get()->toJson(JSON_PRETTY_PRINT);
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
