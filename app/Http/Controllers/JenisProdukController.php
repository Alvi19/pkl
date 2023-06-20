<?php

namespace App\Http\Controllers;

use App\Models\JenisProduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class JenisProdukController extends Controller
{
    public function index()
    {
        $data = JenisProduk::all();
        return view('admin.jenis-produk.index')->with('data', $data);
    }

    public function create()
    {
        return view('admin.jenis-produk.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required',
            'keterangan' => 'required'
        ]);

        JenisProduk::create(
            [
                'judul' => $request->judul,
                'keterangan' => $request->keterangan
            ]
        );

        return redirect()->route('jenis-produk.index');
    }

    public function edit($id)
    {
        $data = JenisProduk::find($id);
        return view('admin.jenis-produk.edit')->with('data', $data);
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'judul' => 'required',
            'keterangan' => 'required'
        ]);

        $data = JenisProduk::find($id);
        $data->judul = $request->judul;
        $data->keterangan = $request->keterangan;
        $data->save();

        return redirect()->route('jenis-produk.index');
    }

    public function destroy($id)
    {
        $data = JenisProduk::find($id);
        $data->delete();

        return redirect()->route('jenis-produk.index');
    }
}
