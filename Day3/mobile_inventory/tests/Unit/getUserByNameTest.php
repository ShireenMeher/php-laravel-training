<?php

namespace Tests\Unit;

use App\Models\Users;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
class getUserByNameTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    use RefreshDatabase;

    public function test_getUserByName()
    {
        //$this->assertTrue(true);

        Users::create(['name'=>'shireen', 'phoneNo'=>'5555565555', 'email' =>'shireen@gmail.com']);
        $response = $this->json('GET', '/api/users/search/byName/shireen');

        $response
            ->assertStatus(200);
    }

    public function test_getUserByNameError()
    {
        //$this->assertTrue(true);

        $response = $this->json('GET', '/api/users/search/byName/shireen');

        $response
            ->assertStatus(404);
    }
}
