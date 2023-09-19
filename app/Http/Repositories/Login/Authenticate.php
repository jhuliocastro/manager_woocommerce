<?php
namespace App\Http\Repositories\Login;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;

class Authenticate
{
    protected Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function execute(): array
    {
        try{
            $data = [
                'user' => $this->request->input('user'),
                'password' => $this->request->input('password')
            ];

            if(Auth::attempt($data)){
                $this->request->session()->regenerate();

                return [
                    'code' => 200,
                ];
            }

            return [
                'code' => 500,
                'message' => Lang::get('login.user_password_invalidate')
            ];
        }catch (\Exception $e){
            return [
                'code' => 500,
                'message' => Lang::get('login.error_processing'),
                'error' => $e->getMessage()
            ];
        }
    }
}
