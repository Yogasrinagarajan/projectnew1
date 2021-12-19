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
		<form action="{{ url('/form/'.$view->id)}}" method="POST"  name="fn" onsubmit="return validateForm()">
			@csrf
            @method('PUT')
			<div class="mt-4 mx-5">
               
                <x-jet-input id="id" class="block mt-1 w-full" type="hidden" name="id" value="{{$view['id']}}" required  />
            </div>

            <div class="mt-4 mx-5">
                <x-jet-label for="name" value="{{ __('First Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{$view['name']}}" required autofocus autocomplete="name" />
            </div>


            <div class="mt-4 mx-5">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{$view['email']}}" required />
            </div>

            <div class="mt-4 mx-5">
                <x-jet-label for="phno" value="{{ __('Phone') }}" />
                <x-jet-input id="phno" class="block mt-1 w-full" type="text" name="phno" value="{{$view['phone']}}" required pattern="[0-9]{10}" />
            </div>

			<div class="mt-4">
				<center><input type="submit" name="submit" value="Update" class="btn w-25 btn-primary " ></center>
			<div class="mt-4">	
		</form>
	</div>	
@endsection


