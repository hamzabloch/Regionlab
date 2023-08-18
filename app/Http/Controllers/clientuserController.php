<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\userController;
use App\Http\Controllers\clientController;
use App\Models\User;
use App\Models\client;
use App\Models\clientuser;

class clientuserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
  /*/*   */
    public function index()
    {
    $client = client::all();
    $user =  User::where('role', 'user')->get();
         return view('meeting.create', compact('client','user'));
    }*/*/

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function assignuser(Request $request, $id){

    $user = User::find($id);
    foreach ($request->client as $id) {
        $user->client()->attach($id);
    }
}





  



    public function store(Request $request)
{
    
    $meeting = new clientuser();
    $meeting->user_id = $request->input('user');
    $meeting->client_id = $request->input('client'); 
    $meeting->save();

    /*return redirect()->route('appointments.index');*/
    return $this->display();
}




    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function edit($id)
{
    $meeting = clientuser::findOrFail($id);
     $client = client::all();
    $user = User::all();
    return view('meeting.edit', compact('meeting','client','user'));
}



    
public function update(Request $request, $id)
{
   
    $meeting = clientuser::findOrFail($id);
     $meeting->user_id = $request->input('user');
    $meeting->client_id = $request->input('client');
    $meeting->save();

    return redirect()->route('meeting');
}

public function destroy($id)
{
    $meeting = clientuser::findOrFail($id);
    $meeting->delete();

    return redirect()->route('user')->with('success', 'meeting deleted successfully');
}

}
