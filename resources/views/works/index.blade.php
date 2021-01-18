@extends('layouts.app')


@section('content')
    <div class="d-flex justify-content-end mb-2">
        <a href="{{route('works.create')}}" class="btn btn-success">Add Job</a>
    </div>


    <div class="card card-default">
        <div class="card-header">Jobs</div>

        @if($works->count())
        <div class="card-body">

        </div>


        @else
        <div class="lead text-center">
            <p>There are no jobs</p>
        </div>
        @endif
    </div>
@endsection
