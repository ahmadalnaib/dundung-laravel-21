@extends('layouts.app')
@section('content')
    <div class="container mt-5">
    <div class="d-flex justify-content-end mb-2">
        <a href="{{route('works.create')}}" class="btn btn-success">Add Job</a>
    </div>


    <div class="card card-default">
        <div class="card-header">Jobs</div>

        @if($works->count())
        <div class="card-body">
         <table class="table">
             <thead>
             <th>Category</th>
             <th>Image</th>
             <th>Title</th>

             <th></th>
             <th></th>


             </thead>
             <tbody>
            @foreach($works as $work)
                <tr>
                    <td>
                        <a href="{{route('categories.edit',$work->category->id)}}">   {{$work->category->name}}</a>
                    </td>
                    <td><img src="{{asset($work->image)}}" width="60px" height="60px" alt=""></td>
                    <td>{{$work->title}}</td>

                    <td>
                        <a href="{{route('works.edit',$work->id)}}" class="btn btn-info btn-sm">Edit</a>
                    </td>

                    @can('delete',$work)
                    <td>
                        <form action="{{route('works.destroy',$work->id)}}" method="post">
                            @method('DELETE')
                            @csrf
                            <button onclick="return confirm('Are you sure you want to delete this job ?')" type="submit" class="btn btn-danger btn-sm del">Trash</button>
                        </form>
                    </td>
              @endcan

                </tr>
            @endforeach
             </tbody>
         </table>
            <div class="pagin">  {!! $works->links() !!}</div>
        </div>



        @else
        <div class="lead text-center">
            <p>There are no jobs</p>
        </div>
        @endif
    </div>
    </div>
@endsection
