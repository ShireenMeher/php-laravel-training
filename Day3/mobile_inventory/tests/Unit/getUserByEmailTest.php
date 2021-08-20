<?php

namespace Tests\Unit;

use App\Models\Users;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
class getUserByEmailTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    use RefreshDatabase;

    public function test_getUserByEmail()
    {
        //$this->assertTrue(true);

        $user = Users::create(['name'=>'shireen', 'phoneNo'=>'5555565555', 'email' =>'shireen@gmail.com']);
        $response = $this->json('GET', '/api/users/search/byEmail/shireen@gmail.com');

        $response
            ->assertStatus(200);
    }

    public function test_getUserByEmailError()
    {
        //$this->assertTrue(true);

        $response = $this->json('GET', '/api/users/search/byEmail/shireen@gmail.com');

        $response
            ->assertStatus(404);
    }
}
