<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HandlerController extends Controller
{
    public function errorHandler() {
        return view('admin.error.404');
    }
}
