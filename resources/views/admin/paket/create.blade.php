@extends('layouts.app')

@section('content')
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col card-wrapper">
                <div class="card">
                    <div class="card-body">
                        <h1 style="text-align: center">Tambah Paket</h1>
                        <div class="pb-3"><a href="{{ route('paket.index') }}" class="btn btn-secondary">
                                << Kembali</a>
                        </div>
                        <form action="{{ route('paket.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="jenis_produk" class="form-label">Jenis Produk</label>
                                <select class="form-control form-control-sm" name="jenis_produk_id" id="jenis_produk"
                                    placeholder="jenis_produk" value="{{ old('produk') }}">
                                    @foreach ($jenis_produks as $jenis_produk)
                                        <option value="{{ $jenis_produk->id }}">{{ $jenis_produk->judul }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="produk_id" class="form-label">Produk</label>
                                <select class="form-control form-control-sm" name="produk_id" id="produk_id"
                                    placeholder="produk" value="{{ old('produk') }}">
                                    @foreach ($produks as $produk)
                                        <option value="{{ $produk->id }}">{{ $produk->nama_produk }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="judul_paket" class="form-label">Judul Paket</label>
                                <textarea class="form-control summernote" rows="5" name="judul_paket" placeholder="Judul Kaket">{{ old('judul_paket') }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <textarea class="form-control summernote" rows="5" name="keterangan" placeholder="keterangan">{{ old('keterangan') }}</textarea>
                            </div>
                            <button class="btn btn-primary" name="simpan" type="submit">SIMPAN</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
