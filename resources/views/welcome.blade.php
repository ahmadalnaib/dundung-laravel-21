@extends('layouts.app')

@section('content')

    <div class="p-4 p-md-5 mb-4 text-white min-vh-100 d-flex align-items-center rounded bg-showcase">
        <div class="col-md-8 px-0">
            <h1 class="display-4 font-italic">Ready to get something awesome?</h1>
            <p class="lead my-3">Practical screencasts for awesome developers..</p>
            <form action="{{route('welcome.index')}}" method="GET">
                <div class="input-group input-group-lg mb-3">
                    <input name="search" type="text" value="{{request()->query('search')}}" class="form-control py-4" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" placeholder="What would you like to search? e.g. Helfer, Amazon">
                </div>
            </form>
            <p class="lead mb-0">Or Just <a href="{{route('jobs')}}" class="text-blue-500 fw-bold">Browse the jobs</a></p>
        </div>
    </div>


    <div class="container pt-5">
    <div class="row">
        <div class="col-md-8 ">
            @forelse($works as $work)
            <div class=" bg-white mb-4 row align-items-center p-2">
              <div class="col-sm">
                  <img src="{{asset($work->image)}}" width="60px" height="60px" style="border-radius: 50%" alt="">
              </div>
                <div class="col-sm">
                    <strong class="d-inline-block mb-2 text-primary">{{$work->category->name}}</strong>
                    <h3 class="mb-0">{{$work->title}}</h3>
                    <div class="mb-1 text-muted">{{$work->created_at->diffForHumans()}} </div>
                    <p class="card-text mb-auto">{{$work->location}} 🏰</p>
                </div>
                <div class="col-sm  d-grid gap-2 d-md-block mt-2 ">
                    <a href="{{$work->link}}" class="btn btn-primary" target="_blank" type="button">APPLY</a>
                    <a href="{{route('works.show',$work)}}"  class="btn btn-primary" type="button">VIEW JOB</a>
                </div>

            </div>
            @empty
                <p class="text-center">
                    No results found <strong>{{request()->query('search')}}</strong>
                </p>
            @endforelse
        </div>

        <div class="col-md-4">
          <h3 class="text-dark">Filters</h3>
          <div class="list-group ">
              @foreach($categories as $category)
                  <div class="list-group-item">
                      <a href="">{{$category->name}}</a>
                  </div>
              @endforeach
          </div>


        </div>
    </div>
        {{ $works->appends(['search'=>request()->query('search')])->links() }}
    </div>

@endsection
