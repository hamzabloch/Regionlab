<?php

namespace App\Http\Controllers;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\userController;
use App\Http\Controllers\clientController;
use App\Http\Controllers\clientuserController;
use App\Http\Controllers\mobileController;
use Illuminate\Support\Facades\Input;
use App\Models\User;
use App\Models\message;
use Illuminate\Support\Facades\Auth;
use App\Models\clientuser;

class clientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   /*public function index()
    {
         $client = client::all();
             $user =  User::where('role', 'user')->get();
    return view('client.index',(compact('client','user')));
}*/




public function message(){

  $auth = Auth::user();

  if ($auth->role == 'admin') {
   $user = User::where('role', 'user')->get();
}else{
   $user = User::where('role', 'admin')->get();
}
return view('client.messagef',(compact('user')));
}




public function usermessage($id){
    $auth = Auth::user();
    if ($auth->role == 'admin') {         
       $user = User::where('role', 'user')->get();
       $userid = User::findOrFail($id);
       $first = message::where('reciever_id', $id)->where('sender_id',$auth->id)->get();
        $second = message::where('reciever_id', $auth->id)->where('sender_id',$id)->get();
        $new=$first->merge($second);
        $select=$new->sortBy('created_at');

       return view('client.message',(compact('select','user','userid')));
   }
   else{
       $user = User::where('role', 'admin')->get();
    
       $userid = User::findOrFail($id);
      $first = message::where('reciever_id', $id)->where('sender_id',$auth->id)->get();
        $second = message::where('reciever_id', $auth->id)->where('sender_id',$id)->get();
        $new=$first->merge($second);
         $select=$new->sortBy('created_at');
       return view('client.message',(compact('select','user','userid')));
   }


}




public function messagesave(Request $request, $id){

   $auth = Auth::user();
   if ($auth->role == 'admin') {  
     $add = new message;
     $add->message = $request->message;
     $add->reciever_id = $id;
     $add->sender_id=$auth->id;
     $add->save();
 }else{
   $add = new message;
   $add->message = $request->message;
   $add->reciever_id = $id;
   $add->sender_id=$auth->id;
   $add->save();
}

return redirect()->back();

}



public function csv_to_array(Request $request) {

   if ($request->file('file')->getMimeType() !== 'text/plain') { 
      return redirect()->back();
  }
  $fileName = time().'_'.$request->file->getClientOriginalName();
  $filePath = $request->file('file')->storeAs('reports', $fileName, 'public');

  $delimiter = ',';
  $header = NULL;
  $additional = array();
  $filename=$fileName;
  $url=url('storage/app/public/'.$filePath);
if (($handle = fopen($url, 'r')) !== FALSE) {
    $header = null; // Initialize the header variable
    $dataList = array(); // Initialize an array to hold all data rows

    while (($row = fgetcsv($handle, 0, $delimiter)) !== FALSE) {
        if ($header === null) {
            $header = $row;
        } else {
            if (count($header) == count($row)) {
                $data = array_combine($header, $row);
                $dataList[] = $data; 
      
                // Add the data to the list
            } else {
            }
        }
    }

    fclose($handle); // Close the file handle

    // Print or process the accumulated data
}
  

                foreach ($dataList as $key=> $value) { 
                    $extra= array_diff_key($value, array_flip(["Person Responsible", "Status", "Name","Position","Time of Call","Work Phone","Country","Other Phone Number","Work E-mail","Company Name","Comments","Lead ID","Other E-mail"]));
                 $vip= json_encode($extra); 
                 if($vip){
                    $col['extra_detail'] = $vip;
                 }
                   $col['person_responsible']=$value['Person Responsible'];
                   $col['status']=$value['Status'];
                   $col['name']=$value['Name'];
                   $col['position']=$value['Position'];
                   $col['time_call']=$value['Time of Call'];
                   $col['phone']=$value['Work Phone']; 
                   $col['country']=$value['Country'];
                   $col['otherphone']=$value['Other Phone Number'];
                   $col['email']=$value['Work E-mail'];
                   $col['otheremail']=$value['Other E-mail'];
                   $col['company']=$value['Company Name'];
                   $col['comment']=$value['Comments'];
                   $col['leadid']=$value['Lead ID']; 

                  
                  $chk= $col['email'];
                  $insertchk=client::where('email',$chk)->first();
                  if($insertchk== null){
                    client::insert($col);
                  }else{
                     return redirect()->back();
                  }
               
               }


           return redirect()->route('client');
       }





       public function file(Request $request , $id){
             $client = Client::findOrFail($id);
           if ($request->type=='file') {
               $fileName = time().'_'.$request->file->getClientOriginalName();
               $filePath = $request->file('file')->storeAs('reports', $fileName, 'public');
               $url=url('storage/app/public/'.$filePath);
               $client->type=$request->type;
               $client->comment=$url;
               $client->save();   
           }
           else{
               $client->type=$request->type;
               $client->comment=$request->comment;
               $client->save(); 
           }

           /*  $client->comment=$request->comment;*/

           return redirect()->route('client');

       }



       public function close(){
           return redirect()->back();
       }



       public function index()
       {
           $auth = Auth::user();
           if ($auth->role == 'user') {
            $client = clientuser::with('clientbelongs')
            ->where('user_id', $auth->id)
            ->get();  }
        else{
          $client = client::all();
      }

      $user =  User::where('role', 'user')->get();
      return view('client.index',(compact('client','user')));
  }






  public function assignuser(Request $request, $id){

     $client=Client::find($id);
     $user=$request->userassign;
$find = clientuser::where('client_id', '=', $id)->get();
    if($find === null){
        $client->users()->attach($user);
     return redirect()->route('client');  
}else{
    $find = clientuser::where('client_id', '=', $id)->delete();
      $client->users()->attach($user);
     return redirect()->route('client');  
}}






 public function create(Request $request)
 {
   return view('client.create');
}
public function store(Request $request){
   $email=$request->email;
$find = Client::where('email', '=', $email)->first(); if ($find === null) {
 $add = new client;
 $add->leadid = $request->leadid;
 $add->status = $request->status;
 $add->name = $request->name;
 $add->email = $request->email;
 $add->phone = $request->phone;
 $add->adress = $request->adress;
 $add->company = $request->company;
 $add->position = $request->position;
 $add->otheremail = $request->otheremail;
 $add->otherphone = $request->otherphone;
 $add->country = $request->country;
 $add->nationality = $request->nationality;   
 $add->time_call = $request->call;   
 $add->person_responsible = $request->responsible;   
 $add->save();
 return redirect()->route('client');
 }else{
     return redirect()->back()->withErrors(['email' => 'Email Already Exits']);
}
}

public function edit($id)
{
    $client = Client::findOrFail($id);
    return view('client.update', compact('client'));
}

public function update(Request $request, $id)
{
   $email=$request->email;
    $client = client::findOrFail($id);
    $client->leadid = $request->input('leadid');
    $client->status = $request->input('status');
    $client->name = $request->input('name');
    $client->email = $request->input('email');
    $client->phone = $request->input('phone');
    $client->adress = $request->input('adress');
    $client->company = $request->input('company');
    $client->position = $request->input('position');
    $client->otheremail = $request->input('otheremail');
    $client->otherphone = $request->input('otherphone');
    $client->country = $request->input('country');
    $client->nationality = $request->input('nationality');
    $client->time_call = $request->input('call');   
    $client->person_responsible = $request->input('responsible');   
    $client->save();
    return redirect()->route('client');
    }





public function updatestatus(Request $request, $id)
{
    $client = client::findOrFail($id);

    $client->status = $request->input('status');

    $client->save();

    return redirect()->back();
}


public function viewcomment($id){
    $client = client::findOrFail($id);
     return view('client.comment', compact('client'));
}
public function viewextra($id){
    $clients = client::findOrFail($id);
    $client=$clients->extra_detail;
     return view('client.extra', compact('client'));
}






    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = client::findOrFail($id);
        $client->delete();

        return redirect()->route('client');
    }

}
