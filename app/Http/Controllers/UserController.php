<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index() {
        return view('admin.admin');
    }   
    public function show($id)
    {
        return 'this is string of user'.$id;
    }
}
