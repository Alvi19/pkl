<?php

namespace App\Http\Controllers;

use App\Models\JenisProduk;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $data = Produk::all();
        return view('admin.produk.index')->with('data', $data);
    }

    public function create()
    {
        $jenis_produks = JenisProduk::all();

        return view('admin.produk.create', compact('jenis_produks'));   
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'jenis_produk_id' => 'required',
            'nama_produk'=> 'required',
            'keterangan' => 'required'
        ]);

        Produk::create(
            [
                'jenis_produk_id' => $request->jenis_produk_id,
                'nama_produk' => $request->nama_produk,
                'keterangan' =>$request->keterangan
            ]
        );
        

        return redirect()->route('produk.index');
    }

    public function edit($id)
    {
        $data = Produk::find($id);
        $jenis_produks = JenisProduk::all();
        return view('admin.produk.edit', compact('data', 'jenis_produks'));
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'jenis_produk_id' => 'required',
            'nama_produk'=> 'required',
            'keterangan' => 'required'
        ]);

        $data = Produk::find($id);
        $data->jenis_produk_id = $request->jenis_produk_id;
        $data->nama_produk = $request->nama_produk;
        $data->keterangan = $request->keterangan;
        $data->save();

        return redirect()->route('produk.index');
    }

    public function destroy($id)
    {
        $data = Produk::find($id);
        $data->delete();

        return redirect()->route('produk.index');
    }
}
