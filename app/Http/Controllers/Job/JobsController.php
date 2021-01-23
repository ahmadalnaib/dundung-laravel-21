<?php

namespace App\Http\Controllers\Job;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Work;
use Illuminate\Http\Request;

class JobsController extends Controller
{
   public  function index()
   {
       $works=Work::latest()->simplePaginate(8);
       $categories=Category::all();
       return view('jobs.index',compact('works','categories'));
   }

    public  function category(Category $category)
    {
      return view('jobs.category')
          ->with('category',$category)
          ->with('works',$category->works()->searched()->simplePaginate(3))
          ->with('categories',Category::all());
    }

    public  function tag(Tag $tag)
    {
        return view('jobs.tag')
            ->with('tag',$tag)
            ->with('works',$tag->works()->searched()->simplePaginate(3))
            ->with('tags',Tag::all())
            ->with('categories',Category::all());
    }
}
