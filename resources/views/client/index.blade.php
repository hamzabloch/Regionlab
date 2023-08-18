@extends('home')
@section('content')

<head>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
</head>

<style type="text/css">
  td{
    word-break: break-all !important;
    padding: 7px !important;
  }
body {
    background-color: #f9f9fa
}

.padding {
    padding: 3rem !important
}

.user-card-full {
    overflow: hidden;
}

.card {
    border-radius: 5px;
    -webkit-box-shadow: 0 1px 20px 0 rgba(69,90,100,0.08);
    box-shadow: 0 1px 20px 0 rgba(69,90,100,0.08);
    border: none;
    margin-bottom: 30px;
}

.m-r-0 {
    margin-right: 0px;
}

.m-l-0 {
    margin-left: 0px;
}

.user-card-full .user-profile {
    border-radius: 5px 0 0 5px;
}

.bg-c-lite-green {
	background: -webkit-gradient(linear, left top, right top, from(#f29263), to(#ee5a6f));
    background: linear-gradient(to right, #ee5a6f, #f29263);
}

.user-profile {
    padding: 20px 0;
}

.card-block {
    padding: 1.25rem;
}

.m-b-25 {
    margin-bottom: 25px;
}

.img-radius {
    border-radius: 5px;
}


 
h6 {
    font-size: 14px;
}

.card .card-block p {
    line-height: 25px;
}

@media only screen and (min-width: 1400px){
p {
    font-size: 14px;
}
}

.card-block {
    padding: 1.25rem;
}

.b-b-default {
    border-bottom: 1px solid #e0e0e0;
}

.m-b-20 {
    margin-bottom: 20px;
}

.p-b-5 {
    padding-bottom: 5px !important;
}

.card .card-block p {
    line-height: 25px;
}

.m-b-10 {
    margin-bottom: 10px;
}

.text-muted {
    color: #919aa3 !important;
}

.b-b-default {
    border-bottom: 1px solid #e0e0e0;
}

.f-w-600 {
    font-weight: 600;
}

.m-b-20 {
    margin-bottom: 20px;
}

.m-t-40 {
    margin-top: 20px;
}

.p-b-5 {
    padding-bottom: 5px !important;
}

.m-b-10 {
    margin-bottom: 10px;
}

.m-t-40 {
    margin-top: 20px;
}

.user-card-full .social-link li {
    display: inline-block;
}

.user-card-full .social-link li a {
    font-size: 20px;
    margin: 0 10px 0 0;
    -webkit-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
}
#myTable_filter{
	margin-bottom: 20px;
}

  th{
    word-break: break-all;
  }


</style>
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                                                       

                            <div class="card-body p-0" style="padding:10px !important;">
                                <div class="table-responsive">


	<table id="myTable"  class="table bg-white font-weight-bold table-striped ">
 
<!-- Modal -->

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
	<h5 class="modal-title" id="exampleModalLongTitle">Upload File</h5>
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	  <span aria-hidden="true">&times;</span>
	</button>
      </div>
      <div class="modal-body">
      <form action="{{route('fileset')}}" method="post" enctype="multipart/form-data" class="text-center"> 
	    @csrf
	<input type="file" name="file" class="form-control @error('file') is-invalid @enderror" required="">
	   @error('file')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
	<input type="submit" name="submit" class="btn btn-primary mt-3" style="margin-left: 170px !important;">
      </form>
      </div>
      
    </div>
  </div>
</div>
        @if(auth()->user()->role === 'admin')

 
    <a href="{{route('client.create')}}" class="btn  mb-5 mx-2 text-white" style="background-color: #242849;">Add Client</a>

<!-- Button trigger modal -->
<button type="button" class="btn mb-5 mx-2 text-white" style="background-color: #242849;" data-toggle="modal" data-target="#exampleModalCenter">
 Csv File
</button>

@endif
  <thead class="" style="background-color: #242849;">
    <tr>
      <th scope="col" class="text-white">ID</th>
      <th scope="col" class="text-white">Lead_ID</th>
      <th scope="col" class="text-white">Status</th>
      <th scope="col" class="text-white">Name</th>
      <th scope="col" class="text-white">Detail</th>
      <th scope="col" class="text-white d-none">Change Status</th>
  </thead>
  <tbody class="bg-white">
    @foreach($client as $index => $clients)


    <tr class="bg-white text-dark">
      @if(auth()->user()->role == 'user')
      <td class="p-2">{{$index+1}}</td>
      <td class="p-1">{{$clients->clientbelongs->leadid}}</td>
      <td class="p-2">{{$clients->clientbelongs->status}}</td>
      <td class="p-2">{{$clients->clientbelongs->name}}</td>
    @endif
       @if(auth()->user()->role == 'admin')
      <td class="p-2">{{$index+1}}</td>
      <td class="p-1">{{$clients->leadid}}</td>
      <td class="p-2">{{$clients->status}}</td>
      <td class="p-2">{{$clients->name}}</td>
    @endif
     

    <!--   <td><a href="{{ route('client.edit', ['id' => $clients->id])}}"class="btn btn-dark">Update Status</a></td> -->

    <td class="p-2">
      <div class="dropdown">
  <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Detail
  </button>
  <div class="dropdown-menu text-center" aria-labelledby="dropdownMenuButton">
 @if(auth()->user()->role == 'user')
 <a class="dropdown-item p-2" data-toggle="modal" data-target=".bd-example-modaldetail{{$clients->clientbelongs->id}}" href="#">Client Detail</a>
@endif
 @if(auth()->user()->role == 'admin')
 <a class="dropdown-item p-2" data-toggle="modal" data-target=".bd-example-modaldetail{{$clients->id}}" href="#">Client Detail</a>
@endif

 @if(auth()->user()->role !== 'user')
    <a class="dropdown-item p-2" data-toggle="modal" data-target="#exampleModall{{$clients->id}}" href="#">
 Assign User
</a>
@endif

 @if(auth()->user()->role == 'admin')
    <a class="dropdown-item p-2" data-toggle="modal" data-target="#exampleModal{{ $clients->id}}" href="#">
Add Comment</a>
@endif

@if(auth()->user()->role == 'admin')
<a class="dropdown-item p-2" href="{{ route('comment.view', ['id' => $clients->id])}}">View Comments</a>
@endif
@if(auth()->user()->role == 'user')
<a class="dropdown-item p-2" href="{{ route('comment.view', ['id' => $clients->clientbelongs->id])}}">View Comments</a>
@endif

@if(auth()->user()->role == 'admin')
<a class="dropdown-item p-2" data-toggle="modal" data-target=".bd-example-modal-lg{{$clients->id}}" href="#">Update Status</a>
@endif
@if(auth()->user()->role == 'user')
<a class="dropdown-item p-2" data-toggle="modal" data-target=".bd-example-modal-lg{{$clients->clientbelongs->id}}" href="#">Update Status</a>
@endif

@if(auth()->user()->role === 'admin')
    <a class="dropdown-item p-2" href="{{ route('client.edit', ['id' => $clients->id])}}">Update</a>


     <a href="{{ route('client.delete', ['id' => $clients->id])}}" class="dropdown-item p-2">Delete</a>
     @endif
  </div>
</div>
    </td>






<td class="p-2 d-none">

@if(auth()->user()->role === 'admin')
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg{{$clients->id}}">Update Status</button>
@endif
@if(auth()->user()->role === 'user')
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg{{$clients->clientbelongs->id}}">Update Status</button>
@endif
    </td>
@if(auth()->user()->role === 'admin')
<div class="modal fade bd-example-modal-lg{{$clients->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  @endif
  @if(auth()->user()->role === 'user')
<div class="modal fade bd-example-modal-lg{{$clients->clientbelongs->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  @endif
  <div class="modal-dialog">
    <div class="modal-content">
      @if(auth()->user()->role === 'admin')
       <form action="{{ route('status.edit', $clients->id) }}" method="post">
        @endif
         @if(auth()->user()->role === 'user')
     <form action="{{ route('status.edit', $clients->clientbelongs->id) }}" method="post">
        @endif
	   @csrf
	<div class="modal-body">
	  <div class="form-group w-100">
	    <h3 class="text-center">Select Status</h3>
	    <select name="status" class="form-control" required="">
        @if(auth()->user()->role === 'admin')
	    	<option>{{$clients->status}}</option>
        @endif
        @if(auth()->user()->role === 'user')
        <option>{{$clients->clientbelongs->status}}</option>
        @endif
	   <option>Open/Fresh Lead</option>
				    <option>Open-Attempted Contact</option>
				    <option>Open-Booked Appointment</option>
				    <option>Open-Client Contact</option>
				    <option>Closed – 6th or 7th attempt htr</option>
				    <option>Open – Fronted</option>
				    <option>Open – Half-Pitched Keep</option>
				    <option>Open – Pitched Keep</option>
				    <option>Open – Deal Written</option>
				    <option>Open – Deal Complied</option>
				    <option>Closed – No pitches/Blow offs</option>
				    <option>Closed – allocated to email marketing</option>
				    <option>Closed – Bad number</option>
				    <option>Closed – Half-pitch no keep</option>
				    <option>Closed – payment cleared – deal complete</option>
				    <option>Closed – dnc heat</option>
				    <option>Open – Institutional pitch</option>
				    <option>Open – dci fresh</option>
				    <option>Open – htr</option>
				    <option>Resting / Mature</option>
				    <option>C – L</option>
				    <option>Good Lead</option>
				    <option>Junk Lead</option>
	</select>
	  </div>
	  
	</div>
	<div class="modal-footer border-top-0 d-flex justify-content-center">
	  <button type="submit" class="btn btn-success">Submit</button>
	</div>
      </form>
    </div>
  </div>
</div>





      @if(auth()->user()->role === 'admin')
<div class="modal fade" id="exampleModal{{$clients->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  @endif
        @if(auth()->user()->role === 'user')
<div class="modal fade" id="exampleModal{{$clients->clientbelongs->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  @endif
  <div class="modal-dialog" role="document">
    <div class="modal-content p-3">
      <div class="modal-header">
	<h5 class="modal-title" id="exampleModalLabel">Select Deatil Type</h5>
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	  <span aria-hidden="true">&times;</span>
	</button>
      </div>
      <div class="modal-body ">
      @if(auth()->user()->role === 'admin')
	<form action="{{route('filetype', $clients->id)}}" method="post" enctype="multipart/form-data">
    @endif
       @if(auth()->user()->role === 'user')
  <form action="{{route('filetype', $clients->clientbelongs->id)}}" method="post" enctype="multipart/form-data">
    @endif
	     @csrf
	      <h2 class="text-center">
	    Seclect One Please
	  </h2>
	  <div class="select px-5 d-flex" style="">
	 
	  <div class="ml-5 pl-5">
	    <input type="radio" name="type" value="file" class="file" style="display: inline-block; font-size: 20px !important;">
	    <label>File</label>
	  </div>
	    <div class="text-center">
	    <input type="radio" name="type" value="comment" class="comment" style="display: inline-block; margin-left: 20px;">
	    <label>Comment</label>
	</div>
      </div>
 
	<dziv id="" class="d-none m-4 file_field">
	   <label class="mr-3">Uplaod File</label>
	  <input type="file" name="file" class="form-control">     
	</div>
	<div id="" class="d-none comment_field">
	  <label class="mb-0 ml-4">Enter Comment</label>
	<input type="text" name="comment" class="p-3 m-4 w-75 ml-5">
	</div>
	<div class="text-center d-none btn-save" id="">
	  <button class="btn btn-primary w-50" type="submit">Submit</button>
	</div>
	</form>
      </div>
      
    </div>
  </div>
</div>
<!-- Modal -->
      @if(auth()->user()->role === 'admin')
<div class="modal fade" id="exampleModall{{$clients->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  @endif
        @if(auth()->user()->role === 'user')
<div class="modal fade" id="exampleModall{{$clients->clientbelongs->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  @endif
  <div class="modal-dialog" role="document">
    <div class="modal-content">
     
      <div class="modal-body">
      @if(auth()->user()->role === 'admin')
	  <form action="{{ route('userassign', $clients->id) }}" method="post">
      @endif
          @if(auth()->user()->role === 'user')
    <form action="{{ route('userassign', $clients->clientbelongs->id) }}" method="post">
      @endif
	   @csrf
	<div class="modal-body">
	  <select id="multipleb" class="js-states form-control @error('user') is-invalid @enderror" style="width: 100%;"   name="userassign" required="">

    
        @php

       $clientuser = App\Models\clientuser::where('client_id',$clients->id)->first();
       if($clientuser !== null){
      $member=App\Models\client::find($clients->id);
      $assign=$member->users()->get()->first()->toArray();
    }
      @endphp

	    @foreach($user as $users)

      @php
      $user_id=$users->id;
      @endphp

      @if($clientuser !== null)
	    <option value="{{$user_id}}"@if(in_array($user_id, $assign)) selected @endif>{{$users->name}}</option>
      @endif

      @if($clientuser == null)
       <option value="{{$user_id}}">{{$users->name}}</option>
      @endif

	 @endforeach
      @error('user')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
	  </select>       
	</div>
	<div class="modal-footer border-top-0 d-flex justify-content-center">
	  <button type="submit" class="btn btn-success">Submit</button>
	</div>
      </form>
      </div>
   
    </div>
  </div>
</div>
    </tr>
    @endforeach
  </tbody>
</table>

 @foreach($client as $index => $clients)

@if(auth()->user()->role === 'admin')
<div class="modal fade bd-example-modaldetail{{$clients->id}} "id="forclose" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
@endif
@if(auth()->user()->role === 'user')
<div class="modal fade bd-example-modaldetail{{$clients->clientbelongs->id}} "id="forclose" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
@endif
  <div class="modal-dialog-md w-75" style="margin-left: 300px;">
    <div class="modal-content px-5 pb-5 pt-2 w-75">

	<table class="table table-bordered " style="border: 1px solid black;">
		
		<thead >
			<a class="p-3 text-dark text-right" href="" id="close">Close <i class="fa fa-times" aria-hidden="true"></i></a>
			<h1 class="text-center" style="background-color: #242849; color: white;">Client Details</h1>
		</thead>
		<tbody>
		 @if(auth()->user()->role == 'user')

     @if($clients->clientbelongs->name !==null)
        	<tr>
        		<th class="font-weight-bold">Name</th>
                <td class="text-dark">{{$clients->clientbelongs->name}}</td> 
            </tr>
            @endif
             @if($clients->clientbelongs->email !==null)
        	<tr>
        		<th class="font-weight-bold">Email</th>
                <td class="text-dark">{{$clients->clientbelongs->email}}</td> 
            </tr>
            @endif
             @if($clients->clientbelongs->status !==null)
        	<tr>
        		<th class="font-weight-bold">Status</th>
                <td class="text-dark">{{$clients->clientbelongs->status}}</td>
            </tr>
            @endif
             @if($clients->clientbelongs->leadid !==null)
        	<tr>
        		<th class="font-weight-bold">Lead ID</th>
                <td class="text-dark">{{$clients->clientbelongs->leadid}}</td>
            </tr>
            @endif
             @if($clients->clientbelongs->phone !==null)
        	<tr>
        		<th class="font-weight-bold">Phone</th>
                <td class="text-dark">{{$clients->clientbelongs->phone}}</td>
            </tr>
            @endif
             @if($clients->clientbelongs->adress !==null)
        	<tr>
        		<th class="font-weight-bold">Adress</th>
                <td class="text-dark">{{$clients->clientbelongs->adress}}</td>
            </tr>
            @endif
             @if($clients->clientbelongs->company !==null)
        	<tr>
        		<th class="font-weight-bold">Company</th>
                <td class="text-dark">{{$clients->clientbelongs->company}}</td>
            </tr>
            @endif
             @if($clients->clientbelongs->position !==null)
        	<tr> 
        		<th class="font-weight-bold">Position</th>
                  <td class="text-dark">{{$clients->clientbelongs->position}}</td>
              </tr>
              @endif
               @if($clients->clientbelongs->country !==null)
        	<tr>
        		<th class="font-weight-bold">Country</th>
                <td class="text-dark">{{$clients->clientbelongs->country}}</td>
            </tr>
            @endif
             @if($clients->clientbelongs->person_responsible !==null)
        	<tr>
                <th class="font-weight-bold">Person Responsible</th>
                <td class="text-dark">{{$clients->clientbelongs->person_responsible}}</td>
            </tr>
            @endif
             @if($clients->clientbelongs->time_call !==null)
        	<tr>
        		<th class="font-weight-bold">Time of Call</th>
                	<td class="text-dark">{{$clients->clientbelongs->time_call}}</td>
                </tr>
        	<tr>
            @endif
             @if($clients->clientbelongs->otheremail !==null)
        		<th class="font-weight-bold">Other Email</th>
                <td class="text-dark">{{$clients->clientbelongs->otheremail}}</td>
            </tr>
            @endif
             @if($clients->clientbelongs->otherphone !==null)
        	<tr>
               <th class="font-weight-bold">Other Phone</th>
                <td class="text-dark">{{$clients->clientbelongs->otherphone}}</td>
            </tr>
            @endif
             @if($clients->clientbelongs->nationality !==null)
              <tr>
               <th class="font-weight-bold">Nationality</th>
                <td class="text-dark">{{$clients->clientbelongs->nationality}}</td>
            </tr>
            @endif


     	
@php
if (!empty($clients->clientbelongs->extra_detail)) {
    $studentObj = json_decode($clients->clientbelongs->extra_detail);

    foreach ($studentObj as $key => $value) {
@endphp
    <tr>
        <th class="font-weight-bold">{{ $key }}</th>
        <td class="text-dark">{{ $value }}</td>
    </tr>
@php
    }
}
@endphp
        			
        		@endif



        		 @if(auth()->user()->role == 'admin')
        		    		 	
             @if($clients->name !==null)

        	<tr>
        		<th class="font-weight-bold">Name</th>
                <td class="text-dark">{{$clients->name}}</td> 
            </tr>
            @endif
             @if($clients->email !==null)

        	<tr>
        		<th class="font-weight-bold">Email</th>
                <td class="text-dark">{{$clients->email}}</td> 
            </tr>
            @endif
             @if($clients->status !==null)

        	<tr>
        		<th class="font-weight-bold">Status</th>
                <td class="text-dark">{{$clients->status}}</td>
            </tr>
            @endif
             @if($clients->leadid !==null)

        	<tr>
        		<th class="font-weight-bold">Lead ID</th>
                <td class="text-dark">{{$clients->leadid}}</td>
            </tr>
            @endif
             @if($clients->phone !==null)

        	<tr>
        		<th class="font-weight-bold">Phone</th>
                <td class="text-dark">{{$clients->phone}}</td>
            </tr>
            @endif
             @if($clients->adress !==null)

        	<tr>
        		<th class="font-weight-bold">Adress</th>
                <td class="text-dark">{{$clients->adress}}</td>
            </tr>
            @endif
             @if($clients->company !==null)

        	<tr>
        		<th class="font-weight-bold">Company</th>
                <td class="text-dark">{{$clients->company}}</td>
            </tr>
            @endif
             @if($clients->position !==null)

        	<tr> 
        		<th class="font-weight-bold">Position</th>
                  <td class="text-dark">{{$clients->position}}</td>
              </tr>
              @endif
             @if($clients->country !==null)

        	<tr>
        		<th class="font-weight-bold">Country</th>
                <td class="text-dark">{{$clients->country}}</td>
            </tr>
            @endif
             @if($clients->person_responsible !==null)

        	<tr>
                <th class="font-weight-bold">Person Responsible</th>
                <td class="text-dark">{{$clients->person_responsible}}</td>
            </tr>
            @endif
             @if($clients->time_call !==null)

        	<tr>
        		<th class="font-weight-bold">Time of Call</th>
                	<td class="text-dark">{{$clients->time_call}}</td>
                </tr>
                @endif
             @if($clients->otheremail !==null)

        	<tr>
        		<th class="font-weight-bold">Other Email</th>
                <td class="text-dark">{{$clients->otheremail}}</td>
            </tr>
            @endif
             @if($clients->otherphone !==null)
        	<tr>
               <th class="font-weight-bold">Other Phone</th>
                <td class="text-dark">{{$clients->otherphone}}</td>
            </tr>
            @endif
             @if($clients->nationality !==null)
              <tr>
               <th class="font-weight-bold">Nationality</th>
                <td class="text-dark">{{$clients->nationality}}</td>
            </tr>
            @endif  

     	
@php
if (!empty($clients->extra_detail)) {
    $studentObj = json_decode($clients->extra_detail);

    foreach ($studentObj as $key => $value) {
@endphp
    <tr>
        <th class="font-weight-bold">{{ $key }}</th>
        <td class="text-dark">{{ $value }}</td>
    </tr>
@php
    }
}
@endphp

        		
        		 @endif   
        		 </tbody>   
    </table>
  </div>
</div>
</div>
</div>

    </div>
    </div>
 </div>
@endforeach





<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
<script type="text/javascript">
  $(document).ready(function(){
$(".file").click(function(){
  $(".file_field").removeClass("d-none");
  $(".file_field").addClass("d-block");
    $(".comment_field").removeClass("d-block");
  $(".comment_field").addClass("d-none");
  $(".btn-save").removeClass("d-none");
  $(".btn-save").addClass("d-block");
});
$(".comment").click(function(){
  $(".comment_field").removeClass("d-none");
  $(".comment_field").addClass("d-block");
    $(".file_field").removeClass("d-block");
  $(".file_field").addClass("d-none");
  $(".btn-save").removeClass("d-none");
   $(".btn-save").addClass("d-block");
});
$('#close').click(function(){
  $('$forclose').hide();
})



});
</script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>


    <script type="text/javascript">
let table = new DataTable('#myTable');
</script>
@endsection




