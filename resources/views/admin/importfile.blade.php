@extends('admin')
@section('content')
 <div>
            @if(session()->has('message'))
             <div class="alert alert-success">
                {{  session()->get('message') }}
            </div>
            @endif
        </div>
<form action="{{route('import')}}" method="POST" enctype="multipart/form-data">
		@csrf
		<input type="file" name="file">
			<input type="submit" value="import" class="btn btn-primary">
		</form>
@endsection