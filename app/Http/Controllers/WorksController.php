<?php

namespace App\Http\Controllers;

use App\Http\Requests\Works\CreateWorksRequest;
use App\Http\Requests\works\UpdateWorkRequest;
use Illuminate\Http\Request;
use App\Models\Work;
use Illuminate\Support\Facades\Storage;

class WorksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $works=Work::latest()->simplePaginate(1);
        return view('works.index',compact('works'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('works.create');
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

        Work::create([
            'name'=>$request->name,
            'title'=>$request->title,
            'location'=>$request->location,
            'description'=>$request->description,
            'image'=>$image,
            'link'=>$request->link,
            'contact'=>$request->contact,
            'published_at'=>$request->published_at
        ]);

        return redirect()->route('works.index')
               ->with('success','Job created successfully');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Work $work)
    {
        return view('works.edit',compact('work'));
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
        ]);

        if($request->hasFile('image'))
        {
            $image= '/storage/'.$request->file('image')->store('works');
            Storage::delete('/storage/'.$work->image);

            $data['image']= $image;
        }
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
            Storage::delete('/storage/'.$work->image);
            $work->forceDelete();
        } else {
            $work->delete();
        }
        return redirect()->back()
            ->with('success','Job has been deleted');
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
