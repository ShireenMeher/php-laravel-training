<?php

namespace Tests\Unit;

use App\Models\Users;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class getUserByPhoneNoTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    use RefreshDatabase;

    public function test_getUserByPhoneNo()
    {
        //$this->assertTrue(true);

        $user=Users::create(['name'=>'shireen', 'phoneNo'=>'5555565555', 'email' =>'shireen@gmail.com']);
        $response = $this->json('GET', '/api/users/search/byPhoneNo/5555565555');

        $response
            ->assertStatus(200);
    }

    public function test_getUserByPhoneNoError()
    {
        //$this->assertTrue(true);

        $response = $this->json('GET', '/api/users/search/byPhoneNo/5555565555');

        $response
            ->assertStatus(404);
    }
}
