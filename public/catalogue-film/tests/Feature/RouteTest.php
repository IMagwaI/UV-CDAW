<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RouteTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    public function test_RouteHome()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }
    public function test_Catalogue()
    {
        $response = $this->get('/addFilm');
        $response->assertStatus(200); // à changer a 404 quand les routes seront restrains à l'acces pr les non connectés 
    }
    public function test_RouteLogin()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }
    public function test_RouteRegister()
    {
        $response = $this->get('/register');
        $response->assertStatus(200);
    }
 /*    public function test_RouteLogout()
    {
        $response = $this->get('/logout');
        $response->assertStatus(200);
    } */
}
