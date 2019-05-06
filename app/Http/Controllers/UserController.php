<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Address;

class UserController extends Controller
{
    public function list_addres()
    {
        $address=Address::orderBy('id')->paginate();
        return view('list_addres',compact('address'));
    }

    public function register_addres()
    {
        return view('register_addres');
    }

    public function register_addres_data(Request $request)
    {
        $this->validate($request,[
            'address' => 'required|max:10', 
            'colony' => 'required'
        ]);
        $address = new Address;
        $address->addresses = $request->address;
        $address->colony = $request->colony;
        $address->save();
        return redirect()->route('list_addres')->with('success','Successfully added user');
    }

    public function register_user()
    {
        $address = Address::with("user")->get();
        return view('register_user',compact('address'));
    }

    public function register_user_data(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|max:10', 
            'email' => 'required',
            'password' => 'required'
        ]);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password =bcrypt($request->password);
        $user->address_id=$request->address_id;
        $user->save();
        return redirect()->route('list_user')->with('success','Successfully added user');
    }

    public function list_user()
    {
        $user = User::with("address")->get();
        return view('list_user',compact('user'));
    }
}
