<?php

namespace Tests\Unit;

use App\Models\Users;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
class deleteUserByEmailTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    use RefreshDatabase;

    public function test_deleteUserByEmail()
    {
        Users::create(['name'=>'shireen', 'phoneNo'=>'5555565555', 'email' =>'shireen@gmail.com']);
        $response = $this->json('DELETE', '/api/users/byEmail/shireen@gmail.com');

        $response
            ->assertStatus(202);
    }

    public function test_deleteUserByEmailError()
    {
        $response = $this->json('DELETE', '/api/users/byEmail/shireen@gmail.com');

        $response
            ->assertStatus(404);
    }
}
