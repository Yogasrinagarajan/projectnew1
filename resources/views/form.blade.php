
@extends('admin')

@section('content')
	<div class="container d-flex flex-column justify-content-center w-50 mt-5 ">
		<center><h1 class="h2">ADD FORM</h1></center>
		<form action="{{ route('form.store') }}" method="POST"  name="fn" onsubmit="return validateForm()">
			@csrf

            <div class="mt-4 mx-5">
                <x-jet-label for="name" value="{{ __('First Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"  autofocus autocomplete="name" />
                @error('name')
                    <div  class="alert alert-danger">{{  $errors->first('name')  }}</div>
                @enderror
            </div>

            <div class="mt-4 mx-5">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" />
                 @error('email')
                    <div  class="alert alert-danger">{{  $errors->first('email')  }}</div>
                @enderror
            </div>

            <div class="mt-4 mx-5">
                <x-jet-label for="phone" value="{{ __('Phone') }}" />
                <x-jet-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')"  pattern="[0-9]{10}" />
                 @error('phno')
                    <div class="alert alert-danger">{{  $errors->first('phone')  }}</div>
                @enderror
            </div>

	
			<div class="mt-4">
				<center><input type="submit" name="submit" value="Submit" class="btn w-25 btn-primary " ></center>
			<div class="mt-4">	
		</form>
	</div>	
@endsection


