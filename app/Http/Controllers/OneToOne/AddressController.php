<?php

namespace App\Http\Controllers\OneToOne;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Address;
use Hash;

class AddressController extends Controller
{
    //returning all user
    public function allUser(){
        $users = User::all();
        return response()->json('users');
    }
    // only single user saved
    public function save(Request $request){
        $id = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        Address::create([
            'post_code' => $request->post_code,
            'address' => $request->address,
            'user_id' => $id->id
        ]);
        $user = User::with('address')->find($id->id);
        return response()->json($user);
    }
}
