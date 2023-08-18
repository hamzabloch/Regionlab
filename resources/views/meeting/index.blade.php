@extends('home')
@section('content')


<table class="table table-hover ">
    <h1 class="text-center">Meeting Manager</h1>
  
  <span>
    <a href="{{route('meeting.create')}}" class="btn btn-danger mb-3">Add Meeting</a>
  </span>
  
  <thead class="bg-dark">
    <tr class="">
      <th class="text-white">ID</th>
      <th class="text-white">User</th>
      <th class="text-white">Client</th>
      <th class="text-white">Update</th>
      <th class="text-white">Delete</th>
   
    </tr>
  </thead>
  <tbody class="bg-light">
  @foreach ($meeting as $index => $meetings)
    <tr>
        <td>{{ $index+1 }}</td>
        <td>{{ $meetings->userview->name }}</td>
        <td>{{ $meetings->clientview->name }}</td>
        <td><a href="{{ route('meeting.edit', ['id' => $meetings->id]) }}" class="btn btn-dark">Update</a></td>
        <td><a href="{{ route('meeting.delete', ['id' => $meetings->id]) }}" class="btn btn-dark">Delete</a></td>
       
    </tr>
@endforeach

  </tbody>
</table>


@endsection