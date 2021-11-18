<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class listeMediasController extends Controller
{
    //
    public function index() {
        return view('playlist');
    }

}
