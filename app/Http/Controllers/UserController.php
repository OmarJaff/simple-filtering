<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {

        $user = User::latest()->filter(request(['search', 'gender' ,'position']))->with('position')->paginate(10)->withQueryString();

        return view('users', [
            'users' => $user
        ]);


    }

}

