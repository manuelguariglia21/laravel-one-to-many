@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
       <h1>{{$post->title}}</h1>
    </div>
    <div class="row justify-content-center">
        <h2>{{$post->category->name}}</h2>
    </div>
</div>
@endsection