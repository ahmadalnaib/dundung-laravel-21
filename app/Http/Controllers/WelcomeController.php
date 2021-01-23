<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tag;
use App\Models\Work;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(Request $request)
    {


        return view('welcome')
               ->with('works',Work::searched()->simplePaginate(8))
               ->with('categories',Category::all())
               ->with('tags',Tag::all());

    }
}
