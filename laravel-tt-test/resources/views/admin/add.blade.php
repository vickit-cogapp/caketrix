@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add New Cake</div>
                    <div class="card-body">
                        <form action="/admin/save">
                            <div class="form-row">
                                <label for="title">Title</label>
                                <input name="title" type="text"/>
                            </div>
                            <div class="form-row">
                                <label for="image">Image (from URL)</label>
                                <input name="image" type="text" />
                            </div>
                            <div class="form-row">
                                <label for="description">Description</label>
                                <textarea name="description"></textarea>
                            </div>
                            <div class="form-row">
                                <button class="button" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection