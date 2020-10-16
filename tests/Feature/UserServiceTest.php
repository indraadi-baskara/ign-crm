<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Traits\FetchHttp as Fetch;

class UserServiceTest extends TestCase
{
    /**
     * A basic feature test example.
     * @test
     * @return void
     */
    public function it_can_fetch_user_and_get_the_result()
    {
        $response = Fetch::get('http://188.166.177.87/ignapi/');
        $response = json_decode($response);

        $this->assertNotEmpty($response);
    }
}
