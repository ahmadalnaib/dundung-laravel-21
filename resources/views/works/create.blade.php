@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header">
            Create job
        </div>

        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="list-group">
                        @foreach($errors->all() as $error)
                            <li class="list-group-item text-danger">
                                {{$error}}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{route('works.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Company Name</label>
                    <input type="text"  id='name' class="form-control" name="name" value="{{old('name')}}">
                </div>

                <div class="form-group">
                    <label for="title">Job Title</label>
                    <input type="text"  id='title' class="form-control" name="title" value="{{old('title')}}">
                </div>

                <div class="form-group">
                    <label for="location">Location</label>
                    <input type="text"  id='location' class="form-control" name="location" value="{{old('location')}}">
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" id="description" cols="5" rows="5">
                        {{old('description')}}
                    </textarea>
                </div>


                <div class="form-group ">
                    <label for="link">Link to the job description</label>
                    <input type="text"  id='link' class="form-control" name="link" value="{{old('link')}}">
                </div>

                <div class="input-group py-3">
                    <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04">
                        <label class="custom-file-label" for="inputGroupFile04">Company Logo</label>
                    </div>
                </div>

                <div class="form-group ">
                    <label for="contact">Contact Email</label>
                    <input type="text"  id='contact' class="form-control" name="contact" value="{{old('contact')}}">
                </div>

                <div class="form-group ">
                    <label for="published_at">Published At</label>
                    <input type="date"  id='published_at' class="form-control" name="published_at" value="{{old('published_at')}}">
                </div>

                <div class="form-group">
                    <button class="btn btn-success">Add Category</button>
                </div>
            </form>
        </div>
    </div>
@endsection
