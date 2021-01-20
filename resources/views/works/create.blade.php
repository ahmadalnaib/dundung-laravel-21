@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header">
            Create job
        </div>

        <div class="card-body">
            @include('partials.errors')
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
                    <input id="description" type="hidden" name="description" value="{{old('description')}}">
                    <trix-editor input="description"></trix-editor>
                </div>


                <div class="form-group ">
                    <label for="link">Link to the job description</label>
                    <input type="text"  id='link' class="form-control" name="link" value="{{old('link')}}">
                </div>

                <div class="form-group">
                    <label for="category">Category</label>
                    <select class="form-control" name="category_id" id="category">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                 @if($tags->count() >0)
                <div class="form-group">
                    <label for="tags">Tags</label>
                    <select name="tags[]" id="tags" class="form-control tags-selector" multiple>
                      @foreach($tags as $tag)
                            <option class="option-multiple" value="{{$tag->id}}">
                                {{$tag->name}}
                            </option>

                        @endforeach
                    </select>
                </div>
                 @endif
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
                    <input type="datetime-local"  id='published_at' class="form-control" name="published_at" value="{{old('published_at')}}">
                </div>

                <div class="form-group">
                    <button class="btn btn-success">Add Job</button>
                </div>
            </form>
        </div>
    </div>
@endsection



