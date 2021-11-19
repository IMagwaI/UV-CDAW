<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class listeMediasController extends Controller
{
    //
    public function index() {
        return view('playlist');
    }

    public function getCategories() {
        $categories = Category::all();
        return view('categories', ['categories' => $categories]);
    }

}
