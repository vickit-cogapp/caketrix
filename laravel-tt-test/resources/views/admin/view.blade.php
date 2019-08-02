@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Cake Tsar Dashboard</div>

                    <div class="card-body">
                        @if ($message)
                            <div class="alert alert-success">
                                {{ $message }}
                            </div>
                        @endif
                        <form action="admin/add">
                            <button class="button">Add new cake</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection