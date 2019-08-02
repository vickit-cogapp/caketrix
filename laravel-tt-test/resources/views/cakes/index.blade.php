@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Cakes</h1>
            @if ($isCakeTsar)
                <form action="/admin">
                    <button class="button">Go to Cake Tsar Dashboard</button>
                </form>
            @endif
        </div>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
              <td>ID</td>
              <td>Cake Name</td>
              <td>Cake Image</td>
              <td>Description</td>
              <td colspan="2">Average Vote</td>
            </tr>
        </thead>
        <tbody>
            @foreach($cakes as $cake)
            <tr>
              <td><a href="/cakes/{{$cake->id}}">{{$cake->id}}</a></td>
              <td><a href="/cakes/{{$cake->id}}">{{$cake->name}}</a></td>
              <td><img src="{{$cake->image_path}}" height="300px"></td>
              <td><a href="/cakes/{{$cake->id}}">{{$cake->description}}</a></td>
              <td>{{$cake->avg_vote}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
<div>
@endsection