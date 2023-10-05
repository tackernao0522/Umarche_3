<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:users');
    }

    public function add(Request $request)
    {
        dd($request);
    }
}
