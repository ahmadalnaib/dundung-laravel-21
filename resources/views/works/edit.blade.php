@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header">
            Edit job
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
            <form action="{{route('works.update',$work->id)}}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf

                <div class="form-group">
                    <label for="name">Company Name</label>
                    <input type="text"  id='name' class="form-control" name="name" value="{{$work->name}}">
                </div>

                <div class="form-group">
                    <label for="title">Job Title</label>
                    <input type="text"  id='title' class="form-control" name="title" value="{{$work->title}}">
                </div>

                <div class="form-group">
                    <label for="location">Location</label>
                    <input type="text"  id='location' class="form-control" name="location" value="{{$work->location}}">
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <input id="description" type="hidden" name="description" value="{{$work->description}}">
                    <trix-editor input="description"></trix-editor>
                </div>


                <div class="form-group ">
                    <label for="link">Link to the job description</label>
                    <input type="text"  id='link' class="form-control" name="link" value="{{$work->link}}">
                </div>

                @if(isset($work))
                    <div class="form-group">
                        <img src="{{asset($work->image)}}" alt="" style="width: 100%">

                    </div>
                    @endif

                <div class="form-group">
                    <label for="category">Category</label>
                    <select class="form-control" name="category_id" id="category">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}"
                                    @if($category->id == $work->category_id)
                                    selected
                                @endif
                            >
                                {{$category->name}}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="tags">Tags</label>
                    <select name="tags[]" id="tags" class="form-control" multiple>
                        @foreach($tags as $tag)
                            <option value="{{$tag->id}}"
                                @if($work->hasTag($tag->id))
                                      selected
                                    @endif
                            >
                                {{$tag->name}}
                            </option>

                        @endforeach
                    </select>
                </div>
                <div class="input-group py-3">
                    <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04">
                        <label class="custom-file-label" for="inputGroupFile04">Company Logo</label>
                    </div>
                </div>

                <div class="form-group ">
                    <label for="contact">Contact Email</label>
                    <input type="text"  id='contact' class="form-control" name="contact" value="{{$work->contact}}">
                </div>

                <div class="form-group ">
                    <label for="published_at">Published At</label>
                    <input type="datetime-local"  id='published_at' class="form-control" name="published_at" value="{{$work->published_at}}">
                </div>

                <div class="form-group">
                    <button class="btn btn-success">Update Job</button>
                </div>
            </form>
        </div>
    </div>
@endsection



