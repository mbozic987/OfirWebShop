<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserController extends Controller
{

    public function index()
    {
        $users = User::paginate(15);
        return view('users.index', compact('users'));
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        if(!Auth::user()->id == $id | !Auth::user()->isAdmin()){
            $id = Auth::user()->id;
        }
        $user = User::find($id);

        return view('users.edit', compact('user'));
    }


    public function update(Request $request, $id)
    {
        //dd($request);
        $request->validate([
            'firstname' => 'required|alpha',
            'lastname' => 'required|string',
            'email' => [
                'required',
                Rule::unique('users')->ignore($id),
            ],
            'phone_number' => [
                'required',
                Rule::unique('users')->ignore($id),
            ],
            'address' => 'required',
            'city' => 'required',
        ]);

        $user = User::find($id);
        $user->firstname = $request->input('firstname');
        $user->lastname = $request->input('lastname');
        $user->email = $request->input('email');
        $user->phone_number = $request->input('phone_number');
        $user->address = $request->input('address');
        $user->city = $request->input('city');

        if($user->update()){
            return redirect('/users')->with('message', 'User updated successfully!!!');
        }else{
            return redirect('/users')->with('message', 'Something went wrong, user is not updated!!!!!!!');
        }
    }


    public function destroy($id)
    {
        User::where('id', $id)->delete();

        return redirect('/users')->with('message','User deleted successfully');
    }
}
