@extends('layouts.app')

@section('content')
<main class="py-4">
    <div class="container">

    <div class="row">
        <div class="col-md-8 ">
            @foreach($works as $work)
            <div class="col p-4 d-flex flex-column  bg-white mb-4 ">
                <img src="{{asset($work->image)}}" width="60px" height="60px" style="border-radius: 50%" alt="">
                <strong class="d-inline-block mb-2 text-primary">{{$work->category->name}}</strong>
                <h3 class="mb-0">{{$work->title}}</h3>
                <div class="mb-1 text-muted">{{$work->created_at->diffForHumans()}}</div>
                <p class="card-text mb-auto">{{$work->location}} 🏰</p>
                <a href="#" class="stretched-link">Continue reading</a>
            </div>
            @endforeach
        </div>

        <div class="col-md-4">
          <h3 class="text-white">Filters</h3>
          <div class="list-group">
              @foreach($categories as $category)
                  <div class="list-group-item">
                      <a href="">{{$category->name}}</a>
                  </div>
              @endforeach
          </div>


        </div>
    </div>
    </div>
</main>
@endsection
