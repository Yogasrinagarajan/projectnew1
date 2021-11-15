@extends('customer')
@section('cuscontent')

<div>
	@if(isset(Auth::user()->email))
	<div>
		<h1>welcome {{Auth::user()->name}}</h1>
	</div>
	@endif
</div>



<div class="container d-flex flex-column justify-content-center w-50 mt-5 ">

        <div>
            @if(session()->has('status'))
             <div class="alert alert-success">
                {{  session()->get('status') }}
            </div>
            @endif
        </div>
            
		<center><h1 class="h2">Profile</h1></center>
		<form action="{{route('customerprofile.create')}}"   name="fn" onsubmit="return validateForm()">
			@csrf
			
			<div class="mt-4 mx-5">
                <x-jet-input id="id" class="block mt-1 w-full" type="hidden" name="id" value="{{Auth::user()->id}}" required readonly />
            </div>

            <div class="mt-4 mx-5">
                <x-jet-label for="fname" value="{{ __('Name') }}" />
                 <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{Auth::user()->name}}" required readonly />
            </div>

             <div class="mt-4 mx-5">
                <x-jet-label for="fname" value="{{ __('Email') }}" />
                  <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{Auth::user()->email}}" required readonly />
            </div>

             <div class="mt-4 mx-5">
                <x-jet-label for="fname" value="{{ __('Phone Number') }}" />
                 <x-jet-input id="phno" class="block mt-1 w-full" type="text" name="phno" value="{{Auth::user()->phonenumber}}" required pattern="[0-9]{10}" readonly />
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