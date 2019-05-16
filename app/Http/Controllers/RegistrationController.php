<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

class RegistrationController extends Controller
{
    public function store()
    {
        $this->validate(request(), [
            'name' => 'required|min:2|max:20',
            'password' => 'required|min:3'
        ]);

        if (!DB::table('users')->where('name', Input::get('name'))->first()) {
            User::create([
                'name' => request()->name,
                'password' => bcrypt(request()->password)
            ]);
            auth()->attempt(request(['name', 'password']));
            session()->flash('message', 'created and logged in');
            return redirect()->home();
        } else {
            if (auth()->attempt(request(['name', 'password']))) {
                session()->flash('message', 'logged in');
                return redirect()->home();
            } else {
                session()->flash('message', 'invalid password');
                return redirect()->home();
            }
        }
    }

    public function destroy()
    {
        auth()->logout();
        return redirect()->home();
    }
}
