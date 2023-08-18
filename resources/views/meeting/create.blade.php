@extends('home')


@section('content')


<form action="{{route('meeting.store')}}" method="post">
  <h1 class="text-center">Add Meeting</h1>
  @csrf
  <div class="form-group">
    <label for="customer">User:</label>
    <select class="form-control" id="customer" name="user" required>
      @foreach($user as $users)
      <option value="{{$users->id}}">{{$users->name}}</option>
     @endforeach
      
    </select>
  </div>
  <div class="form-group">
    <label for="trainer">Client:</label>
    <select class="form-control" id="trainer" name="client" required>
       @foreach($client as $clients)
      <option value="{{$clients->id}}">{{$clients->name}}</option>
     @endforeach
    </select>
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection