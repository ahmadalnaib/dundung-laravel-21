@extends('layouts.app')

@section('content')
@include('layouts.header')
    <div class="container pt-5">
    <div class="row">
        <div class="col-md-8 ">
            @foreach($works as $work)
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
            @endforeach
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
    </div>

@endsection
