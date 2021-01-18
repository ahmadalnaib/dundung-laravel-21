<?php

namespace App\Http\Controllers;

use App\Http\Requests\Works\CreateWorksRequest;
use Illuminate\Http\Request;
use App\Models\Work;

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
            'contact'=>$request->contact
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(work $work)
    {
        $work->delete();
        return redirect()->route('works.index')
            ->with('success','Job has been deleted');
    }
}
