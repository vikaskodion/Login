<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserDetailController extends Controller
{
    function usersList()
    {
       
        $data= User::all();
        return view('users_list',['users'=>$data]);
    }
}
