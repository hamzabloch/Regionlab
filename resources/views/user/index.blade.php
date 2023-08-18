@extends('home')
@section('content')

@if(auth()->user()->role == 'admin')

<style type="text/css">
  td{
    word-break: break-all !important;
    padding:7px !important; 
  }

</style>
    <!-- Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />


     <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                                                       <span class="">
    <a href="{{route('user.create')}}" class="btn btn-primary m-3"><i class="fa fa-plus" aria-hidden="true"></i> Add User</a>
  </span>

                            <div class="card-body">
                                <div class="table-responsive">
<table class="table  bg-white font-weight-bold">
  <thead class="" style="background-color: #242849;">
    <tr class="">
      <th scope="col" class="text-white">ID</th>
      <th scope="col" class="text-white" >Name</th>
      <th scope="col" class="text-white">Email</th>
      
      <th scope="col" class="text-white">Update</th>
      <th scope="col" class="text-white">Dalete</th>
      <th scope="col" class="text-white">Assign Clients</th>
    </tr>
  </thead>
  <tbody>
    @foreach($user as $index => $users)
    <tr class="text-dark">
      <td>{{$index+1}}</td>
      <td>{{$users->name}}</td>
      <td>{{$users->email}}</td> 
     
      <td><a href="{{ route('user.edit', ['id' => $users->id])}}"class="btn btn-success">Update</a></td>
      <td><a href="{{ route('user.delete', ['id' => $users->id])}}" class="btn btn-danger">Delete</a></td>
      <td>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg{{$users->id}}">Assign Clients</button>
    </td>


<div class="modal fade bd-example-modal-lg{{$users->id}}" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
     
      <div class="modal-body">
          <form action="{{ route('clientassign', $users->id) }}" method="post">
           @csrf
        <div class="modal-body">

          <select class="js-states form-control multiple @error('client') is-invalid @enderror" style="width: 100%;" name="client[]" multiple required="">
           @foreach($client as $clients)
            <option  value="{{$clients->id}}">{{$clients->name}}</option>
         @endforeach

                         @error('client')
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
</div>
</div>
</div>
</div>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Select2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
    
      $(".multiple").select2({
          placeholder: "Select Clients",
          allowClear: true
      });
    </script>
  


@else

 <script>
      window.location.href = 'client';
    </script>  
@endif
@endsection