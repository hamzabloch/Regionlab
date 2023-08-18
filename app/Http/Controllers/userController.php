<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\userController;
use App\Http\Controllers\clientController;
use App\Models\client;
use App\Models\User;
use App\Models\clientuser;
use Illuminate\Support\Facades\Validator;


class userController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

     $client = client::doesntHave('users')->get();
       $user =  User::all();
       return view('user.index',(compact('user','client')));
   }





   public function assign(Request $request, $id){

    $client=$request->client;
    $user = User::find($id);
 $find = clientuser::where('client_id', '=', $client)->first();
    if($find === null){
    foreach ($request->client as $id) {
        $user->clients()->attach($id);
        }
      return redirect()->route('user');
    }else{
      foreach ($request->client as $id) {
    $find = clientuser::where('client_id', '=', $id)->delete(); 
        $user->clients()->attach($id);
        }
      return redirect()->route('user');
}}






public function create(Request $request)
{
   return view('user.create');
}

public function store(Request $request){


$request->validate([ 
    'name' => ['required', 'string', 'max:255'], 
     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
]); 


$email=$request->email;
$user = User::where('email', '=', $email)->first(); if ($user === null) {
$pasOne=$request->password;
$pasTwo=$request->password_confirmation;
if($pasOne!==$pasTwo){
     return redirect()->back()->withErrors(['confirm' => 'Password Not Matched']);
}
 $add = new User;
 $add->name = $request->name;
 $add->email = $request->email;
 $add->role = $request->role;
 $add->password = Hash::make($request->password);
 $add->save();
 return redirect()->route('user');
}
else{
     return redirect()->back()->withErrors(['email' => 'Email Already Exits']);
}}





public function edit($id)
{
    $user = user::findOrFail($id);
    return view('user.update', compact('user'));
}

public function update(Request $request, $id)
{

    $request->validate([  
            'password' => ['required', 'string', 'min:8']
]); 

     $user = User::findOrFail($id);
    $user->name = $request->input('name');
    $user->email = $request->input('email');
    $user->password = Hash::make($request->input('password'));
    $user->save();
    return redirect()->route('user');
}
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = user::findOrFail($id);
        $user->delete();

        return redirect()->route('user');
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/login');  
    }

}
