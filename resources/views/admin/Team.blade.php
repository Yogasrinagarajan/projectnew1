@extends('admin')
@section('content')
	<div class="container d-flex flex-column justify-content-center w-50 mt-5 ">
        <div>
            @if(session()->has('message'))
             <div class="alert alert-success">
                {{  session()->get('message') }}
            </div>
            @endif
        </div>

		<center><h1 class="h2">Add Team</h1></center>
		<form action="{{ route('team.store')}}" method="POST"  name="fn">
			@csrf
           
            <div class="mt-4 mx-5">
                <x-jet-label for="staff" value="{{ __('Staff') }}" />
                <select id="staff" class="block mt-1 w-full" name="staff" >
                    @foreach ($view as  $emp)
                        <option value="{{$emp->id}}"> {{$emp->name}} </option>
                    @endforeach
                </select>
            </div>


            <div class="mt-4 mx-5">
                <x-jet-label for="customer" value="{{ __('Customer') }}" />
                 <select id="customer" class="block mt-1 w-full" name="customer[]" multiple>
                    @foreach ($view1 as  $cus)
                        <option value="{{$cus->id}}"> {{$cus->name}} </option>
                    @endforeach
                </select>
            </div>	
    



				<!-- <label for= "fname" class="form-label fs-5">First Name</label><br>
				<input type="text" name="fname" id="fname" class="form-control "><br>
				<label for="lname" class="form-label fs-5">Last Name</label><br>
				<input type="text" name="lname" id="lname" class="form-control "><br>
				<label for="email" class="form-label fs-5">Email</label><br>
				<input type="email" name="email" id="email" class="form-control "><br>
				<label for="phno" class="form-label fs-5">Phone Number</label><br>
				<input type="text" name="phno" id="phno" class="form-control " pattern="[0-9]{10}"><br> -->
			<div class="mt-4">
				<center><input type="submit" name="submit" value="Submit" class="btn w-25 btn-primary " ></center>
			<div class="mt-4">	
		</form>
	</div>	
@endsection


