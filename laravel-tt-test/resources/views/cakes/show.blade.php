@extends('layouts.app')

@section('content')
<div>
  <h1>{{$cake->name}}</h1>
  <p><img src="{{$cake->image_path}}" height="300px" /></p>
  <p>{{$cake->description}}</p>
</div>
<form method="post" action="/vote">
  @csrf
  <input type="hidden" name="cake_id" value="{{ $cake->id }}" />
  <input type="text" name="vote" />
  <button type="submit" class="btn btn-primary">Vote</button>

</form>
  <p>
    <a href="{{$cake->id}}/edit">Edit</a>
  </p>

@if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif
@endsection
