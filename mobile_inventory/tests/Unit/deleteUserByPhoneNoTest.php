<?php

namespace Tests\Unit;

use App\Models\Users;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
class deleteUserByPhoneNoTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    use RefreshDatabase;

    public function test_deleteUserByPhoneNo()
    {
        Users::create(['name'=>'shireen', 'phoneNo'=>'5555565555', 'email' =>'shireen@gmail.com']);
        $response = $this->json('DELETE', '/api/users/byPhoneNo/5555565555');

        $response
            ->assertStatus(202);
    }

    public function test_deleteUserByPhoneNoError()
    {
        $response = $this->json('DELETE', '/api/users/byPhoneNo/5555565555');

        $response
            ->assertStatus(404);
    }
}
