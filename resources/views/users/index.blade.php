@extends('layouts.app')


@section('content')



    <div class="card card-default">
        <div class="card-header">Users</div>

        @if($users->count())
            <div class="card-body">
                <table class="table">
                    <thead>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th></th>

                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>
                                <img width="40px" height="40px" style="border-radius:50%" src="{{Gravatar::src($user->email)}}" alt="">
                            </td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>

                            <td>
                                @if(!$user->isAdmin())
                                <form action="{{route('users.make-admin',$user->id)}}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-dark btn-sm">Make Admin</button>
                                </form>
                                @else
                                    <form action="{{route('users.make-Not-admin',$user->id)}}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-dark btn-sm d">Make User</button>
                                    </form>


                                    @endif
                            </td>


                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>



        @else
            <div class="lead text-center">
                <p>There are no users</p>
            </div>
        @endif
    </div>
@endsection
