<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use App\Http\Requests\storeRequest;
use App\Http\Requests\updateRequest;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File as Files;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files=File::latest()->paginate(5);
        return view('index',compact( 'files'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('upload');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeRequest $request)
    {
        $this->getImage($request);

        File::create($request->all());

        return redirect()->back()->with('success', true);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        return view('Show',compact('file'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file)
    {

        return view('edit',compact('file'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(updateRequest $request, File $file)
    {
        $this->removeImage($file);
        $this->getImage($request);

        $file->update($request->all());

        return redirect()->back()->with('successUpdate', true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        $imageId=$file->id;
        $this->removeImage($file);
        $file->delete();
        return redirect()->route('files.index')->with('Deleted',sprintf(trans('public.Deleted'),$imageId));
    }


    private function getImage($request)
    {
        $image = $request->file;
        $path = Storage::putFile('public', $image);
        $request->merge(array('path' => $path, 'volume' => round($image->getSize() / 1024), 'thumbnail' => $this->setIntervention($image)));
    }


    private function setIntervention($image)
    {
        $image_resize = Image::make($image)->resize(450, 350)->save(public_path('thumbnails\\' . 'thumbnail_' . $image->getClientOriginalName()));
        return $image_resize->basename;
    }

    private function removeImage($file)
    {

        Storage::delete($file->path);

        Files::delete(public_path('thumbnails\\' .  $file->thumbnail));

    }
}