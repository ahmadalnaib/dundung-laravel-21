@extends('layouts.app')

@section('content')
    <div class="container mt-5">
    <div class="d-flex justify-content-end mb-2">
        <a href="{{route('tags.create')}}" class="btn btn-success">Add Tag</a>
    </div>
    <div class="card card-default">
        <div class="card-header">
            Tags
        </div>
        @if($tags->count())
            <div class="card-body">
                <table class="table">
                    <thead>
                    <th>Tags Count</th>
                    <th>Name</th>

                    <th></th>
                    <th></th>
                    </thead>
                    <tbody>
                    @foreach($tags as $tag)
                        <tr>
                               <td>{{$tag->works->count()}}</td>
                            <td>{{$tag->name}}</td>
                            <td><a href="{{route('tags.edit',$tag->id)}}" class="btn btn-info btn-sm">Edit</a>

                            </td>
                            <td>
                                <form action="{{route('tags.destroy',$tag)}}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button onclick="return confirm('Are you sure you want to delete this tag ?')" type="submit" class="btn btn-danger btn-sm del">Delete</button>

                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>


            </div>

        @else
            <div class="lead text-center">
                <p>There are no tags</p>
            </div>

        @endif
    </div>
    </div>
@endsection
