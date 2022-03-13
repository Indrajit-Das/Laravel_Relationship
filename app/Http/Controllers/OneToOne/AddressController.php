<?php

namespace App\Http\Controllers\OneToOne;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
Use Illuminate\Support\Facedes\Hash;

class AddressController extends Controller
{
    //returning all user
    public function allUser(){
        $users = User::all();
        return response()->json('users');
    }
    // only single user saved
    public function save(Request $request){
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        Address::create([
            'post_code' => $request->post_code,
            'address' => $request->address,
            'user_id' => $user->id
        ]);
        return response()->json('Successfully saved user data ');
    }
}
