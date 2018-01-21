<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proposal;
use App\User;

class UserController extends Controller
{


    public function cabinet() {
        $userId = 1;
        $user = User::where('id', $userId)->first();
        if (empty($user)) {
            return view('login');
        }
        //Спонсор
        if ($user->role == 1) {
            $proposals = Proposal::where(['status' => 1, 'verified' => 1])->get();
        } else {
            $proposals = Proposal::where(['user' => $userId, 'verified' => 1])->get();
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
