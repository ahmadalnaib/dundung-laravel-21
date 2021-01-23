@extends('layouts.app')

@section('content')

    <div class="container pt-5">
        <div class="row">
            <div class="col-md-8 ">
                <div class="row bg-white mb-4 row align-items-center p-2">
                    <div class="col-sm">
                        <img src="{{asset($work->image)}}" width="80px" height="80px" style="border-radius: 50%" alt="">
                    </div>

                    <div class="col-sm">
                        <strong class="d-inline-block mb-2 text-primary">{{$work->category->name}}</strong>
                        <h3 class="mb-0">{{$work->title}}</h3>
                        <div class="mb-1 text-muted">{{$work->created_at->diffForHumans()}} </div>
                        <p class="card-text mb-auto">{{$work->location}} 🏰</p>
                    </div>

                    <div class="col-sm  d-grid gap-2 d-md-block mt-2 ">
                        <a href="{{$work->link}}" class="btn btn-primary" target="_blank" type="button">APPLY</a>
                        <a href="mailto:{{$work->contact}}" class="btn btn-primary" target="_blank" type="button">Email</a>
                    </div>

                    <div class="mt-4 mx-auto p-4 border-top overflow-auto text-justify ">
                            <p class="lead">{!! $work->description !!}}</p>
                    </div>

                </div>

            </div>
            <div >
                <div>
                    <small>{{$work->user->name}}</small>
                    <p ><img class="avatar avater-sm" src="{{Gravatar::src($work->user->email)}}" alt=""></p>
                </div>
                <div>
                    @foreach($work->tags as $tag)

                        <a href="{{route('job.tag',$tag->id)}}" class="badge badge-pill badge-secondary">{{$tag->name}}</a>
                    @endforeach
                </div>
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
