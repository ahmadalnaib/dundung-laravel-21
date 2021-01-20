@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <main class="py-4">

                        <div class="container">
                            @include('partials.messages')
                            <div class="row">
                                <div class="col-md-4">
                                    <ul class="list-group">
                                        <li class="list-group-item">
                                            <a href="{{route('works.index')}}">👔 Jobs </a>
                                        </li>
                                        @if(auth()->user()->isAdmin())
                                            <li class="list-group-item">
                                                <a href="{{route('users.index')}}">🎨 Users </a>
                                            </li>
                                            <li class="list-group-item">
                                                <a href="{{route('categories.index')}}">✔ Categories </a>
                                            </li>

                                            <li class="list-group-item">
                                                <a href="{{route('tags.index')}}">🎈 Tags </a>
                                            </li>

                                        @endif
                                    </ul>

                                    <ul class="list-group mt-5">
                                        <li class="list-group-item">
                                            <a href="{{route('trashed')}}"> 🗑 Trashed Jobs</a>
                                        </li>
                                    </ul>

                                </div>
                                <div class="col-md-8">
                              @yield('content')
                                </div>
                            </div>
                        </div>
                    </main>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
