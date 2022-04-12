<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function form_login()
    {
        return view('auth.login');
    }

    public function signin(Request $request)
    {
        $user = User::create([
            'name' => 'becky ada',
            'access' => 'admin',
            'email' => 'rebtshikadila@gmail.com',
            'created_at' => date('Y-m-d H:i:s'),
            'password' => Hash::make('1234')
        ]);
        return redirect('/');
    }

    public function login(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $remember = $request->has('remember') ? true : false;
        $credential = ['email' => $request->email, 'password' => $request->password];

        if (Auth::attempt($credential, $remember)) {
            $request->session()->regenerate();
            return $this->verifyAuthorization();
        }

        return redirect()->back()->withInput($request->only('email'))->withError('Les informations d\'identification fournies ne correspondent pas à nos enregistrements.');
    }



    protected function verifyAuthorization()
    {
        if (auth()->user()->access == 'user') {
            Auth::logout();
            return redirect('/login')->withMsg('Vous n\'avez pas l\'acces necessaire pour acceder à cette ressource');
        }

        return redirect('/');
    }
}
