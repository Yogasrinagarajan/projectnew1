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
            
		<center><h1 class="h2">Update</h1></center>
		<form action="{{ url('admin/employee/'.$data->id)}}" method="POST"  name="fn" onsubmit="return validateForm()">
			@csrf
            @method('PUT')
            <?php
            	 $name=$data->name;
                 $name1=explode(" ",$name);
                 $fn=$name1[0];
        		 $ln=$name1[1];
    
            ?>
			<div class="mt-4 mx-5">
               
                <x-jet-input id="id" class="block mt-1 w-full" type="hidden" name="id" value="{{$data['id']}}" required  />
            </div>

            <div class="mt-4 mx-5">
                <x-jet-label for="fname" value="{{ __('First Name') }}" />
                <x-jet-input id="fname" class="block mt-1 w-full" type="text" name="fname" value="{{$fn}}" required autofocus autocomplete="fname" />
            </div>

            <div class="mt-4 mx-5">
                <x-jet-label for="lname" value="{{ __('Last Name') }}" />
                <x-jet-input id="lname" class="block mt-1 w-full" type="text" name="lname" value="{{$ln}}" required  />
            </div>	

            <div class="mt-4 mx-5">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{$data['email']}}" required />
            </div>

            <div class="mt-4 mx-5">
                <x-jet-label for="phno" value="{{ __('Phone') }}" />
                <x-jet-input id="phno" class="block mt-1 w-full" type="text" name="phno" value="{{$data['phonenumber']}}" required pattern="[0-9]{10}" />
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
				<center><input type="submit" name="submit" value="Update" class="btn w-25 btn-primary " ></center>
			<div class="mt-4">	
		</form>
	</div>	

@endsection


