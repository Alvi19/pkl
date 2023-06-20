@extends('layouts.app')

@section('content')
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col card-wrapper">
                <div class="card">
                    <div class="card-body">
                        <h1 style="text-align: center">Foto </h1>
                        <div class="pd-3"><a href="/admin/foto/create" class="btn btn-primary">+ Foto</a>
                        </div><br>
                        <div class="table-responsive">
                            <table class="table table-stripped">
                                <thead>
                                    <tr>
                                        <th class="col-1">No</th>
                                        <th>Foto</th>
                                        <th>Keterangan</th>
                                        <th>Status</th>
                                        <th class="col-2">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>
                                                <img width="100px" height="100px" src="{{ '/uploads/' . $item->file }}"
                                                    alt="">
                                            </td>
                                            <td>{{ $item->keterangan }}</td>
                                            <td>
                                                <label class="custom-toggle">
                                                    <input type="checkbox" {{ $item->status ? 'checked' : '' }}>
                                                    <span class="custom-toggle-slider rounded-circle"></span>
                                                </label>
                                            </td>
                                            <td>
                                                <a href="{{ route('foto.edit', [$item->id]) }}"
                                                    class="btn btn-sm btn-warning">Edit</a>
                                                <form onsubmit="return confirm('Yakin mau hapus data ini?')"
                                                    action="{{ route('foto.destroy', $item->id) }}" class="d-inline"
                                                    method="POST" enctype="multipart/form-data">
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
