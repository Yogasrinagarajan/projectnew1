
@extends('employee')
@section('empcontent')
       <div class="container my-5">
      <div class="d-flex position-relative py-3">
     <div class="">
          <h2 class="font-semibold text-xl text-gray-800 leading-tight">
              {{ __('Customer Details') }}
          </h2>
       </div>
       <div class=" position-absolute top-0 end-0">
          <a href="{{route('employee.create')}}"><button class="btn btn-primary">Add Customer</button></a>
        </div>
    </div>
  		<table class="table fs-6">
  			<thead>
	         <tr>
	            <th scope="col">Id</th>
	            <th scope="col">Name</th>
	            <th scope="col">Email</th>
	            <th scope="col">Phone</th>
	             <th scope="col">Action</th>
	         </tr>
	        </thead> 
         @foreach ($view as $view)
         <tr>
            <td>{{ $view->id}}</td>
            <td>{{ $view->name}}</td>
            <!-- <td>{{ $view->lastname}}</td> -->
            <td>{{ $view->email}}</td>
            <td>{{ $view->phonenumber}}</td>
            <td>
              	<a href="{{ url('employee/'.$view->id.'/edit')}}" class="btn btn-primary">Edit</a>
              	<!-- <a href="{{('deletecustomer/'.$view->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure to delete {{  $view->firstname }}')">Delete</a> -->
            </td>
            
           
         </tr>
         @endforeach
      </table>
  </div>
@endsection