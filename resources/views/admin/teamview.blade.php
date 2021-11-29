@extends('admin')
@section('content')
 <div class="container my-5 mx-5">
      <div class="d-flex position-relative py-3">
     <div class="">
          <h2 class="font-semibold text-xl text-gray-800 leading-tight">
              {{ __('Team Details') }}
          </h2>
       </div>
       <div class=" position-absolute top-0 end-0">
        <a href="{{ route('team.create') }}"><button class="btn btn-primary">Add Team</button></a>
        <a href='/importfile'  class="btn btn-primary">Import</a>
        <a href='/export' class="btn btn-primary">Export</a>
        </div>
    </div>
<table class="table fs-6">
  			<thead>
	         <tr>
	            <th scope="col">Staff</th>
	            <th scope="col">Customers</th>
	             <th scope="col">No of Customers</th>
	         </tr>
	        </thead>
	@foreach($users as $user)
	<tr>
		<td>{{ $user->name }}</td>
		<td>
	@foreach($user->users as $team)
		{{ $team->name }}@if(!$loop->last),@endif
	@endforeach
		</td>
		<td>{{$user->users->count()}}</td>

	</tr>
	@endforeach
</table>
</div>
@endsection