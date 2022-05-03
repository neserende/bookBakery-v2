<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public static function getAllBookInfo(){
        $selectedUser = User::findOrFail(auth()->user()->id);
        return $selectedUser->books;
    }
}
