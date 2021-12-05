<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::paginate(4);
        return view('adminPage',['users' => $users]);
    }
    // enlever le role admin
    public function removeAdmin($id)
    {
        $user = User::find($id);
        $user->role = 'user';
        $user->save();
        return redirect()->route('admin');
    }
    // ajouter le role admin
    public function addAdmin($id)
    {
        $user = User::find($id);
        $user->role = 'admin';
        $user->save();
        return redirect()->route('admin');
    }
    // bannir un utilisateur etat = 0
    public function banDebanUser($id)
    {
        $user = User::find($id);
        if($user->role == 'banned'){
            $user->role = 'user';
        }else{
        $user->role = "banned";
        }
        $user->save();
        return redirect()->route('admin');
    }
}
