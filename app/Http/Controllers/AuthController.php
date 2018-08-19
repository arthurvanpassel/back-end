<?php
namespace App\Http\Controllers;
use Validator;
use Request;
use Redirect;
use Auth;
use Hash;
use App\User;
use App\Http\Controllers\Controller;

class AuthController extends Controller {
    public function getLogin() {
        return view('auth/login');
    }

    public function postLogin() {
        $rules = array(
            'username' => 'required',
            'password' => 'required'
        );

        $validator = Validator::make(request::all(), $rules);

        if ($validator->fails()) {
            return Redirect::route('login')->withErrors($validator);
        }

        $auth = Auth::attempt(array(
            'username' => request::get('username'),
            'password' => request::get('password')
        ), false);      //false means that you will not stay logged in

        if (!$auth) {
            return Redirect::route('login')->withErrors(array(
                'Invalid credentials were provided.'
            ));
        }
        else {
            return Redirect::route('home');
        }
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect('/login');
      }

      public function getRegister() {
        return view('auth/register');
    }

    public function postRegister() {
        $rules = array(
            'username' => 'required|unique:users,username',
            'password' => "required|same:password_confirm",
            'password_confirm' => "required",
        );

        $validator = Validator::make(request::all(), $rules);

        if ($validator->fails()) {
            return Redirect::route('register')->withErrors($validator);
        }
        $password = request::get('password');
        $user = new User;
        $user->username = request::get('username');
        $user->password = Hash::make($password);
        $user->save();

        return redirect::route('login');
    }
}