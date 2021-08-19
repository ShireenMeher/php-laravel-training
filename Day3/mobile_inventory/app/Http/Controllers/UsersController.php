<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UsersController extends Controller
{
    //
    public function createUser(Request $request){



        try{
            $users = DB::table('users')->insert([
                'name' => $request->name,
                'email' => $request->email,
                'phoneNo' => $request->phoneNo,
            ]);
        }
        // catch block is executed when an exception is thrown in the try block
        // an object $e of Exception class is created
        catch(Exception $e){
            echo "\n". "Caught exception: " . $e->getMessage(); //Exception handling
        }
        $this->renderable(function (NotFoundHttpException $e, $request) {
            if ($request->is('api/users')) {
                return response()->json([
                    'message' => 'Record not found.'
                ], 404);
            }
        });

        echo "User $request->name is created successfully!\n";
        return $users;

    }


    public function getUserByName($username){

        $user = DB::table('users')->where('name', $username)->first();
        return $user;
    }

    public function getUsersByEmail($e_mail){

        $users = DB::table('users')->where('email', $e_mail)->get();
        return $users;
    }

    public function getUserByPhoneNo($phone_no){

        $user = DB::table('users')->where('phoneNo', $phone_no)->first();
        return $user;
    }



    public function getAllUsers(){
        $users = DB::table('users')->get();
//        $names = array();
//        $phone_numbers = array();
//
//        foreach ($users as $user){
//            array_push($names, $user['name']);
//            array_push($phone_numbers, $user['phoneNo']);
//        }
//
//        return response()->json(['phoneNo'=> $phone_numbers, 'name' => $users[]]);
//        ['phoneNo'=> $users['phoneNo']]

        return $users;
    }

    public function deleteUserByPhoneNo($phone_number){
        DB::table('users')->where('phoneNo',$phone_number)->delete();

        echo "User deleted successfully!";

    }

    public function deleteUserByName($username){
        DB::table('users')->where('name',$username)->delete();

        echo "User deleted successfully!";

    }

    public function deleteUserByEmail($email){
        DB::table('users')->where('email',$email)->delete();

        echo "User deleted successfully!";

    }


}
