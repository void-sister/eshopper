<?php

namespace Tests\Feature;

use App\Product;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ViewIndexPageTest extends TestCase
{
    /** @test */
    public function index_page_loads_correctly()
    {
        //arrange

        //act
        $response = $this->get('/');

        //assert
        $response->assertStatus(200);
        $response->assertSee('My Cool E-Commerce Project');
    }
}
