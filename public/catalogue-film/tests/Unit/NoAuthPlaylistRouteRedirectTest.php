<?php

namespace Tests\Unit;

use Illuminate\Support\Facades\Auth;
use Tests\TestCase;


class NoAuthPlaylistRouteRedirectTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_NoAuthPlaylistRoute()
    {
        $response = $this->get('/playlist')->assertRedirect('/');
    }
}
