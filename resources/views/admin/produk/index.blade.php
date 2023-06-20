@extends('layouts.app')

@section('content')
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col card-wrapper">
                <div class="card">
                    <div class="card-body">
                        <h1 style="text-align: center">Produk</h1>
                        <div class="pd-3"><a href="/admin/produk/create" class="btn btn-primary">+ Tambah Produk</a></div>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-stripped">
                                <thead>
                                    <tr>
                                        <th class="col-1">No</th>
                                        <th>Nama Produk</th>
                                        <th>Deskripsi</th>
                                        <th>Jenis Produk</th>
                                        <th>Status</th>
                                        <th class="col-2">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->nama_produk }}</td>
                                            <td>{{ $item->keterangan }}</td>
                                            <td>{{ $item->jenis_produk->judul }}</td>
                                            <td>
                                                <label class="custom-toggle">
                                                    <input type="checkbox" {{ $item->status ? 'checked' : '' }}>
                                                    <span class="custom-toggle-slider rounded-circle"></span>
                                                </label>
                                            </td>
                                            <td>
                                                <a href="{{ route('produk.edit', [$item->id]) }}"
                                                    class="btn btn-sm btn-warning">Edit</a>
                                                <form onsubmit="return confirm('Yakin mau hapus data ini?')"
                                                    action="{{ route('produk.destroy', $item->id) }}" class="d-inline"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-danger" type="submit"
                                                        name="submit">Del</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
