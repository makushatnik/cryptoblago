<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Proposal;
use App\User;

class UserController extends Controller
{


    public function cabinet() {
        //$user = Auth::user();
        $userId = 5;
        // if (!empty($user)) {
        //     $userId = $user->id;
        // } else {
        //     return view('login');
        // }
        $user = User::find($userId);
        if (empty($user)) {
            return view('login');
        }
        
        //Спонсор
        if ($user->role != 2) {
            $proposals = Proposal::where(['verified' => 1])->get();
        } else {//if ($user->role == 2) {
            $proposals = Proposal::where(['user_id' => $userId, 'verified' => 1])->get();
        }

        return view('cabinet', compact('user', 'proposals'));
    }

    public function proposal(Proposal $proposal) {
        

        return view('proposal', $proposal);
    }

    public function login() {
        if (empty(request('username')) || empty(request('password'))) {
            return view('login');
        }

        $user = User::where(['name' => request('username'), 'password' => md5(request('password'))])->first();
        if (empty($user)) {
            return view('login');
        }
        return redirect('cabinet');
    }

    public function logout() {
        if (!Auth::check()) {
            Auth::logout();
        }
        
        return redirect('/');
    }

    public function register() {
        // if (empty(request('username')) || empty(request('password')) || empty(request('password_confirm'))) {
        //     return view('register');
        // }

        $this->validate(request(), [
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'password_confirm' => 'required',
            'role'  => 'required'
        ]);

        if (request('password') != request('password_confirm')) {
            return view('register');
        }

        $user = new User;
        $user->name = request('username');
        $user->email = request('email');
        $user->password = md5(request('password'));
        $user->role = request('role');
        $user->verified = 0;
        $user->save();
        return redirect('cabinet');
    }
}
