<?php

namespace App\Http\Controllers\Job;

use App\Http\Controllers\Controller;
use App\Models\Category;
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
}
