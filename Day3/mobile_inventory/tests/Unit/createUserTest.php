<?php

namespace Tests\Unit;

use App\Models\Users;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class createUserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    use RefreshDatabase;

    public function test_createUserErrorEmailRequired()
    {
        //$this->assertTrue(true);
        $response = $this->json('POST','/api/users',['name'=>'shireen', 'phoneNo'=>'5555555555']);

        $response
            -> assertStatus(422)
            ->assertJSON(["errors" => ["email" => [
                "The email field is required."
            ]]]);
    }

    public function test_createUserErrorNameRequired()
    {
        //$this->assertTrue(true);
        $response = $this->json('POST','/api/users',[ 'phoneNo'=>'5555555555', 'email'=>'shireen@gmail.com']);

        $response
            -> assertStatus(422)
            ->assertJSON(["errors" => ["name" => [
                "The name field is required."
            ]]]);
    }

    public function test_createUserErrorPhoneNoRequired()
    {
        //$this->assertTrue(true);
        $response = $this->json('POST','/api/users',[ 'name'=>'shireen', 'email'=>'shireen@gmail.com']);

        $response
            -> assertStatus(422)
            ->assertJSON(["errors" => ["phoneNo" => [
                "The phone no field is required."
            ]]]);
    }

    public function test_createUser()
    {
        //$this->assertTrue(true);
        $response = $this->json('POST','/api/users',['name'=>'shireen', 'phoneNo'=>'5555565555', 'email' =>'shireen@gmail.com']);

        $response
            -> assertStatus(201)
            ->assertJSON([
                "msg" => "User shireen is created successfully!"

            ]);
    }
}
