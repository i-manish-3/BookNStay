<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;

use App\Mail\RegisterMail;
// use Str;
use Mail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Spatie\Backtrace\Arguments\ReducedArgument\ReducedArgumentContract;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }


    // user authenticate
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        if ($validator->passes()) {
            if (Auth::attempt([
                'email' => $request->email,
                'password' => $request->password
            ])) {
                if(Auth::user()->role != 'user')
                {
                    Auth::logout();
                    return redirect()
                    ->route('account.login')
                    ->with('error','You are not authorized to login as user');
                }
                return redirect()->route('account.dashboard');
            } else {
                return redirect()
                ->route('account.login')
                ->with('error','Either email or password is incorrect');
            }
        } else {
            return redirect()->route('account.login')
                ->withInput()
                ->withErrors($validator);
        }
    }

    // registration code 

    public function register()
    {
        return view('register');
    }
    
    // //registeration checks

    public function processRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users',
            'name' => 'required|string',
            'password' => 'required|min:8|confirmed'
        ]);

        if ($validator->passes()) {

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role = 'user';
            // $user->remember_token = Str::random(40);
            $user->save();

            // Mail::to($save->email)->send(new RegisterMail($save));
            return redirect()->route('account.login')->with('success','You have registed successfully');

          
        } else {
            return redirect()->route('account.register')
                ->withInput()
                ->withErrors($validator);
        }
   
    }

    // logout

    public function logout()
    {
        Auth::logout();
        return redirect()->route('account.login');
    }


}
