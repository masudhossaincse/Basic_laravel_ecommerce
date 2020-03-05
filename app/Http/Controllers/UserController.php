<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function manageUser()
    {
    	$users = User::Paginate(10);
    	return view('admin.user.user', ['users'=>$users]);
    }
}
