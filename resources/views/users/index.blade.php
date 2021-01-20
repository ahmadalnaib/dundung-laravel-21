@extends('layouts.app')


@section('content')



    <div class="card card-default">
        <div class="card-header">Users</div>

        @if($users->count())
            <div class="card-body">
                <table class="table">
                    <thead>
                    <th>Name</th>
                    <th>Email</th>
                    <th></th>

                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>

                            <td>
                                @if(!$user->isAdmin())
                                <form action="" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-dark btn-sm d">Make Admin</button>
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
