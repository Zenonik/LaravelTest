<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App;
use App\check;

class UserController extends Controller
{
    public function update($id)
    {
        if ($this->checkdb() === 1) {
            return view('500');
        } else {
            $post = User::where('id', $id)->firstOrFail();
            $post->update(request()->validate([
                'id' => 'required',
                'name' => 'required',
                'email' => 'required',
                'password' => 'required',
                'updated_at' => data_get()
            ]));

            return redirect('/profile/');
        }
    }

    public function checkdb()
    {
        try {
            $test = DB::connection()->getPdo();
        } catch (\Throwable $e) {
            $test = 1;
        }
        return $test;
    }
}
