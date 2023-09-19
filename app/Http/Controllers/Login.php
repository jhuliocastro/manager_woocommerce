<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Inertia\Inertia;
use App\Http\Repositories\Login\Authenticate;

class Login extends Controller
{
    public function index(): \Inertia\Response
    {
        $props['translate'] = (Object) Lang::get('login');

        return Inertia::render('Login/Index', $props);
    }

    public function login(Request $request): \Illuminate\Http\JsonResponse
    {
        $request->validate([
            'user' => 'required',
            'password' => 'required'
        ]);

        $authenticate = (new Authenticate($request))->execute();

        return response()->json($authenticate);
    }
}
