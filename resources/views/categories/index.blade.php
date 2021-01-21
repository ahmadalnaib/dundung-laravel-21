@extends('layouts.app')

@section('content')
    <div class="container mt-5">
   <div class="d-flex justify-content-end mb-2">
       <a href="{{route('categories.create')}}" class="btn btn-success">Add Category</a>
   </div>
 <div class="card card-default">
     <div class="card-header">
         Categories
     </div>
     @if($categories->count())
     <div class="card-body">
         <table class="table">
             <thead>
             <th>Jobs Count</th>
             <th>Name</th>

             <th></th>
             <th></th>
             </thead>
             <tbody>
             @foreach($categories as $category)
               <tr>
                   <td>{{$category->works->count()}}</td>
                   <td>{{$category->name}}</td>
                   <td><a href="{{route('categories.edit',$category->id)}}" class="btn btn-info btn-sm">Edit</a>

                   </td>
                   <td>
                       <form action="{{route('categories.destroy',$category)}}" method="post">
                           @method('DELETE')
                           @csrf
                           <button onclick="return confirm('Are you sure you want to delete this category ?')" type="submit" class="btn btn-danger btn-sm del">Delete</button>

                       </form>
                   </td>
               </tr>
             @endforeach
             </tbody>
         </table>


     </div>

         @else
             <div class="lead text-center">
                 <p>There are no categories</p>
             </div>

         @endif
 </div>
    </div>
@endsection
