@extends('layouts.app')


@section('content')
    <div class="d-flex justify-content-end mb-2">
        <a href="{{route('works.create')}}" class="btn btn-success">Add Job</a>
    </div>


    <div class="card card-default">
        <div class="card-header">Jobs</div>

        @if($works->count())
        <div class="card-body">
         <table class="table">
             <thead>
             <th>Image</th>
             <th>Title</th>
             <th></th>
             <th></th>
             <th></th>


             </thead>
             <tbody>
            @foreach($works as $work)
                <tr>
                    <td><img src="{{asset($work->image)}}" width="60px" height="60px" alt=""></td>
                    <td>{{$work->title}}</td>
                    <td>
                    <td>
                        <a href="{{route('works.edit',$works)}}" class="btn btn-info btn-sm">Edit</a>

                    </td>
                    <td>
                        <a href="" class="btn btn-danger btn-sm">Trash</a>
                    </td>

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
@endsection
