@extends('layouts.admin')

@section('content')
<div class="container">

      {{-- errors messages --}}
      @if ($errors->any())
        <div class="alert alert-danger" role="alert">
          <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
          </ul>
        </div>
      @endif

       <h1>Create New Post</h1>
       
       <form action="{{route('admin.posts.store')}}" method="POST">
         @csrf

        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Enter title">
          @error('title')
		        <p class='form_errors'>
			        {{$message}}
	  	      </p>
	        @enderror
        </div>

        <div class="form-group">
          <label for="descriptiom">Description</label>
          <textarea type="text" class="form-control @error('title') is-invalid @enderror" name="description" id="description" placeholder="Enter description">
          </textarea>
          @error('description')
		        <p class='form_errors'>
			        {{$message}}
	  	      </p>
	        @enderror
        </div>

        <button type="submit" class="btn btn-primary">Pubblica Post</button>
        <button type="reset" class="btn btn-secondary" >Reset</button>
      </form>
</div>
@endsection