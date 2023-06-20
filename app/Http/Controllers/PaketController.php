<?php

namespace App\Http\Controllers;

use App\Models\JenisProduk;
use App\Models\Paket;
use App\Models\Produk;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Paket::all();
        return view('admin.paket.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $jenis_produks = JenisProduk::all();
        $produks = Produk::all();
        return view('admin.paket.create', compact('jenis_produks', 'produks'));
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
            'jenis_produk_id' => 'required',
            'produk_id' => 'required',
            'judul_paket' => 'required',
            'keterangan' => 'required'
        ]);

        Paket::create(
            [
                'jenis_produk_id' => $request->jenis_produk_id,
                'produk_id' => $request->produk_id,
                'judul_paket' => $request->judul_paket,
                'keterangan' =>$request->keterangan
            ]
        );
        

        return redirect()->route('paket.index');
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
        $data = Paket::find($id);
        $jenis_produks = JenisProduk::all();
        $produks = Produk::all();
        return view('admin.paket.edit', compact('data', 'jenis_produks', 'produks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $this->validate($request, [
            'jenis_produk_id' => 'required',
            'produk_id' => 'required',
            'judul_paket' => 'required',
            'keterangan' => 'required'
        ]);

        $data = Paket::find($id);
        $data->jenis_produk_id = $request->jenis_produk_id;
        $data->produk_id = $request->produk_id;
        $data->judul_paket = $request->judul_paket;
        $data->keterangan = $request->keterangan;
        $data->save();

        return redirect()->route('paket.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Paket::find($id);
        $data->delete();

        return redirect()->route('paket.index');
    }
}
