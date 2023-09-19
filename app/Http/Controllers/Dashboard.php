<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Inertia\Inertia;

class Dashboard extends Controller
{
    public function index(): \Inertia\Response
    {
        $props['translate'] = (Object) Lang::get('login');

        return Inertia::render('Login/Dashboard', $props);
    }
}
