<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    //
    public function createUser(Request $request){

        DB::table('users')->insert([
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
        ]);

        echo "User $request->firstName $request->lastName is created successfully!";

    }

    public function fetchAllUsers(){
        $users = DB::table('users')->get() ;
        return $users;
    }

    public function fetchUserbyId($id){

        $user = DB::table('users')->where('id', $id)->first();
        return $user;
    }

    public function deleteUser($id){
        DB::table('users')->where('id',$id)->delete();

        echo "User $id is deleted successfully!";

    }



}
