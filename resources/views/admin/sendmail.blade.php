
@extends('admin')

@section('content')
	<div class="container d-flex flex-column justify-content-center w-50 mt-5 ">
        <div>
            @if(session()->has('msg'))
             <div class="alert alert-success">
                {{  session()->get('msg') }}
            </div>
            @endif
        </div>
		<center><h1 class="h2">Send Mail</h1></center>
		<form action="{{route('mail')}}" method="POST"  name="fn" onsubmit="return validateForm()">
			@csrf
            <div class="mt-4 mx-5">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" />
                 @error('email')
                    <div  class="alert alert-danger">{{  $errors->first('email')  }}</div>
                @enderror
            </div>

				<center><input type="submit" name="submit" value="Submit" class="btn mt-5 w-25 btn-primary " ></center>
			<div class="mt-4">	
		</form>
	</div>	
@endsection


