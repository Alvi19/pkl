<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\JenisProduk;
use App\Models\Paket;
use App\Models\Produk;
use App\Models\Vidio;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public  function index()
    {
        $jumlah_produk = Produk::count();
        $jumlah_jenis_produk = JenisProduk::count();
        $jumlah_paket = Paket::count();
        $jumlah_foto = Foto::count();
        $jumlah_vidio = Vidio::count();

        return view('admin.dashboard', compact('jumlah_produk', 'jumlah_jenis_produk', 'jumlah_paket', 'jumlah_foto', 'jumlah_vidio'));
    }
}
