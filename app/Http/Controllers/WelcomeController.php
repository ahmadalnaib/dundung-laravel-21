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
        $search = $request->query('search');
      if($search) {
          $works=Work::where('title', 'LIKE', "%{$search}%")
                    ->orWhere('name', 'LIKE', "%{$search}%")
              ->simplePaginate(1);
      } else{
          $works=Work::latest()->simplePaginate(8);
      }

        return view('welcome')
               ->with('works',$works)
               ->with('categories',Category::all())
               ->with('tags',Tag::all());

    }
}
