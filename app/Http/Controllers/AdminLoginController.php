<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
class AdminLoginController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        if($validator->passes())
        {
            if (Auth::guard('admin')->attempt([
                'email' => $request->email,
                'password' => $request->password
            ]))
            {
                if(Auth::guard('admin')->user()->role != 'admin')
                {
                    Auth::guard('admin')->logout();
                    return redirect()->route('admin.login')->with('error','You are not authorized to login as admin');
                }
                return redirect()->route('admin.dashboard');
            }
            else
            {
                return redirect()->route('admin.login')
                ->with('error','Either email or password is incorrect');
            }
        }else
        {
            return redirect()->route('admin.login')
            ->withInput()
            ->withErrors($validator);
        }
    }
    // admin logout
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
