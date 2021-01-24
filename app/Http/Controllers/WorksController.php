<?php

namespace App\Http\Controllers;

use App\Http\Requests\Works\CreateWorksRequest;
use App\Http\Requests\works\UpdateWorkRequest;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Models\Work;
use Illuminate\Support\Facades\Storage;

class WorksController extends Controller
{


    public  function __construct()
    {
        $this->middleware('verifiedCategoryCount')
              ->only('create','store');

        $this->middleware('auth')
            ->only('create','store','edit','update','destroy');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $works=Work::with('user')->latest()->simplePaginate(3);
        return view('works.index',compact('works'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        $tags=Tag::all();
        return view('works.create',compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateWorksRequest $request)
    {
//        upload the image
        $image= '/storage/'.$request->file('image')->store('works');

        $work= Work::create([
            'name'=>$request->name,
            'title'=>$request->title ,
            'location'=>$request->location,
            'description'=>$request->description,
            'image'=>$image,
            'link'=>$request->link,
            'contact'=>$request->contact,
            'published_at'=>$request->published_at,
            'category_id'=>$request->category_id,
            'user_id'=>auth()->user()->id,
        ]);

        if($request->tags)
        {
            $work->tags()->attach($request->tags);
        }

        return redirect()->route('works.index')
               ->with('success','Job created successfully');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Work $work)
    {
        $categories=Category::all();
        return view('works.show',compact('work','categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Work $work)
    {
        $categories=Category::all();

        return view('works.edit',compact('work','categories'))
            ->with('tags',Tag::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWorkRequest $request, Work $work)
    {

        $data=$request->only([
            'name',
            'title',
            'location',
            'description',
            'link',
            'contact',
            'category_id'

        ]);

        if($request->hasFile('image'))
        {
            $image= '/storage/'.$request->file('image')->store('works');

//            //delete image function is in work models
          $work->deleteImage();

            $data['image']= $image;
        }

            //sync method good for many to many relationships
            $work->tags()->sync($request->tags);


        $work->update($data);


        return redirect()->route('works.index')
            ->with('success','Job updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $work=Work::withTrashed()->where('id',$id)->firstOrFail();

        if($work->trashed())
        {
//            deleteImage function in work models
           $work->deleteImage();
            $work->forceDelete();
        } else {
            $this->authorize('delete',$work);
            $work->delete();
        }
        return redirect()->back()
            ->with('danger','Job has been deleted');
    }


    public  function  trashed()
    {
       $works=Work::onlyTrashed()->get();
       return view('works.trashed',compact('works'));
    }

    public function restore($id)
    {
        $work=Work::withTrashed()->where('id',$id)->firstOrFail();
      $work->restore();
      return redirect()->route('works.index')
          ->with('success','Job restore');
    }





}
