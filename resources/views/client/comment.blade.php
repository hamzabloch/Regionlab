@extends('home')
@section('content')

<table class="table bordered">
	<thead style="background-color: #242849;">
	<th class="text-white">Type</th>
	<th class="text-white">Comment</th>
</thead>
<tbody class="bg-white">
	<td class="text-dark">{{$client->type}}</td>
	<td class="text-dark">{{$client->comment}}</td>
</tbody>
</table>

@endsection