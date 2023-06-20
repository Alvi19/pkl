@extends('layouts.app')

@section('content')
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col card-wrapper">
                <div class="card">
                    <div class="card-body">
                        <h1 style="text-align: center">Tambah Produk</h1>
                        <div class="pb-3"><a href="{{ route('produk.index') }}" class="btn btn-secondary">
                                << Kembali</a>
                        </div>
                        <form action="{{ route('produk.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="jenis_produk" class="form-label"> Jenis Produk</label>
                                <select class="form-control form-control-sm" name="jenis_produk_id" id="jenis_produk"
                                    placeholder="Produk" value="{{ old('produk') }}">
                                    @foreach ($jenis_produks as $jenis_produk)
                                        <option value="{{ $jenis_produk->id }}">{{ $jenis_produk->judul }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="nama_produk" class="form-label">Nama Produk</label>
                                <textarea class="form-control summernote" rows="5" name="nama_produk" placeholder="Nama Produk">{{ old('nama_produk') }}</textarea>
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
