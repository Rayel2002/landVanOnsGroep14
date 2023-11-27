<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Event;
use Spatie\Permission\Models\Role;

class AdminController extends Controller {

    /**
     * Show the form for creating a new resource.
     */
    public function show() {
        return view('adminHome');
    }
}
