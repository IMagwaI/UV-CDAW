<?php

namespace Tests\Unit;

use Illuminate\Support\Facades\Auth;
use Tests\TestCase;


class NoAuthProfilRouteRedirectTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_NoAuthProfilRoute()
    {
        $response = $this->get('/profil')->assertRedirect('/');
    }
}
