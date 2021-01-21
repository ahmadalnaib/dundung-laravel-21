@extends('layouts.app')

@section('content')
    <div class="container mt-5">
    <div class="card card-default">
        <div class="card-header">
            Create tag
        </div>

        <div class="card-body">
         @include('partials.errors')
            <form action="{{route('tags.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text"  id='name' class="form-control" name="name">
                </div>
                <div class="form-group">
                    <button class="btn btn-success">Add Tag</button>
                </div>
            </form>
        </div>
    </div>
    </div>
@endsection
