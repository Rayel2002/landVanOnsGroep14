<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class AdminController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function show() {
        return view('adminHome');
    }
}