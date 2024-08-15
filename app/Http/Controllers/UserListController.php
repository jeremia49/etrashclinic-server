<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserListController extends Controller
{
    public function pengguna(){
        $users = User::all();

        return view('users.index', [
            "users"=>$users,
        ]);
    }
}
