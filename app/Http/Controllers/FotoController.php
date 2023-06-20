<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use Illuminate\Http\Request;

class FotoController extends Controller
{
   public function index()
   {
        $data = Foto::all();

        return view('admin.foto.index')->with('data', $data);
   }

   public function create()
   {
        return view('admin.foto.create');
   }

   public function store(Request $request)
   {
        $this->validate($request, [
            'keterangan' => 'required',
            'file' => 'required'
        ]);

        $file = $request->file('file');
        $gambar = time().'_'.$request->file->getClientOriginalName(); 
        $file->move(public_path('uploads'),$gambar);

        Foto::create(
            [
                'keterangan' => $request->keterangan,
                'file' => $gambar, 
            ]
        );

        return redirect()->route('foto.index');
   }

   public function edit($id )
   {
        $data = Foto::find($id);
        return view('admin.foto.edit')->with('data', $data);
   }

   public function update($id, Request $request)
    {
        $this->validate($request, [
            'keterangan' => 'required',
        ]);

        $data = Foto::find($id);
        $data->keterangan = $request->keterangan;

        if ($request->file){
            $file = $request->file('file');
            $gambar = time().'_'.$request->file->getClientOriginalName(); 
            $file->move(public_path('uploads'),$gambar);
            $data->file = $gambar;
        }
        $data->save();

        return redirect()->route('foto.index');
    }

    public function destroy($id)
    {
        $data = Foto::find($id);
        $data->delete();

        return redirect()->route('foto.index');
    }
}