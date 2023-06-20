@extends('layouts.app')

@section('content')
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col card-wrapper">
                <div class="card">
                    <div class="card-body">
                        <h1 style="text-align: center">Tambah Foto</h1>
                        <div class="pb-3"><a href="{{ route('foto.index') }}" class="btn btn-secondary">
                                << Kembali</a>
                        </div>
                        <form action="{{ route('foto.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <textarea class="form-control summernote" rows="5" name="keterangan" placeholder="keterangan">{{ old('keterangan') }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="form-grup">gambar</label>
                                <input type="file" class="form-control form-control-sm" name="file"
                                    id="exampleInputEmail1" value="{{ old('gambar') }}">
                            </div>
                            <button class="btn btn-primary" name="simpan" type="submit">SIMPAN</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
