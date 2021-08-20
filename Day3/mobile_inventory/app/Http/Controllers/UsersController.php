<?php

namespace App\Http\Controllers;

use App\Http\Requests\createUserRequest;
use App\Models\Servicse;

class UsersController extends Controller
{
    protected $service;

    public function __construct(Servicse $service)
    {
        $this->service = $service;
    }

    public function createUser(createUserRequest $request){
        return $this->service->createUser($request);
    }

    public function getUserByName($username){
        return $this->service->getUserByName($username);
    }

    public function getUsersByEmail($e_mail){
        return $this->service->getUsersByEmail($e_mail);
    }

    public function getUserByPhoneNo($phone_no){
        return $this->service->getUserByPhoneNo($phone_no);
    }

    public function getAllUsers(){
        return $this->service->getAllUsers();
    }

    public function deleteUserByPhoneNo($phone_number){
        return $this->service->deleteUserByPhoneNo($phone_number);
    }

    public function deleteUserByName($username){
        return $this->service->deleteUserByName($username);
    }

    public function deleteUserByEmail($email){
        return $this->service->deleteUserByEmail($email);
    }
}
