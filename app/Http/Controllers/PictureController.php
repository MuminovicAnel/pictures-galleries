<?php

namespace App\Http\Controllers;

use App\Picture;
use App\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Kfirba\Directo\Directo;


class PictureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Gallery $gallery)
    {

        return redirect()->route('galleries.show', request()->route('gallery'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Gallery $gallery)
    {
        return view('pictures.create', compact('gallery'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Directo $directo)
    {
        dd($request->all());
        $picture = new Picture($request->all());
        $picture->gallery_id = $request->gallery;
        
        $picture->save();

        return redirect()->route('galleries.show', request()->route('gallery'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Picture  $picture
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery, Picture $picture, Request $request)
    {
        if (Str::startsWith($request->header('Accept'), 'image')) {
            return redirect(\Storage::disk('s3')->temporaryUrl($picture->path,  now()->addMinutes(1)));
        } else {
            return view('pictures.show', compact('gallery', 'picture'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Picture  $picture
     * @return \Illuminate\Http\Response
     */
    public function edit(Picture $picture)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Picture  $picture
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Picture $picture)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Picture  $picture
     * @return \Illuminate\Http\Response
     */
    public function destroy(Picture $picture)
    {
        //
    }
}
