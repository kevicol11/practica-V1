<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class registro extends Controller
{ public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:8|',
        ]);

        $user = User::create($request->all());

        return response($user, 200);
    }
}
