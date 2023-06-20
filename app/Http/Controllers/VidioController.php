<?php

namespace App\Http\Controllers;

use App\Models\Vidio;
use Illuminate\Http\Request;

class VidioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Vidio::all();

        return view('admin.video.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.video.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'keterangan' => 'required',
            'file' => 'required'
        ]);

        $file = $request->file('file');
        $video = time().'.'.$request->file->getClientOriginalExtension(); 
        $file->move(public_path('uploads'),$video);

        Vidio::create(
            [
                'keterangan' => $request->keterangan,
                'file' => $video, 
            ]
        );

        return redirect()->route('video.index');
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
        $data = Vidio::find($id);
        return view('admin.video.edit')->with('data', $data);
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
        $this->validate($request, [
            'keterangan' => 'required',
        ]);

        $data = Vidio::find($id);
        $data->keterangan = $request->keterangan;

        if ($request->file){
            $file = $request->file('file');
            $video = time().'.'.$request->file->getClientOriginalExtension();
            $file->move(public_path('uploads'),$video);
            $data->file = $video;
        }
        $data->save();

        return redirect()->route('video.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Vidio::find($id);
        $data->delete();

        return redirect()->route('video.index');
    }
}
