@extends('layouts.app')

@section('content')
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col card-wrapper">
                <div class="card">
                    <div class="card-body">
                        <h1 style="text-align: center"> Video </h1>
                        <div class="pd-3"><a href="/admin/vidio/create" class="btn btn-primary">+ Video</a></div><br>
                        <div class="table-responsive">
                            <table class="table table-stripped">
                                <thead>
                                    <tr>
                                        <th class="col-1">No</th>
                                        <th>Video</th>
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
                                                <iframe width="250" height="300" src="{{ '/uploads/' . $item->file }}">
                                                </iframe>
                                            </td>
                                            <td>{{ $item->keterangan }}</td>
                                            <td>
                                                <label class="custom-toggle">
                                                    <input type="checkbox" {{ $item->status ? 'checked' : '' }}>
                                                    <span class="custom-toggle-slider rounded-circle"></span>
                                                </label>
                                            </td>
                                            <td>
                                                <a href="{{ route('video.edit', [$item->id]) }}"
                                                    class="btn btn-sm btn-warning">Edit</a>
                                                <form onsubmit="return confirm('Yakin mau hapus data ini?')"
                                                    action="{{ route('video.destroy', $item->id) }}" class="d-inline"
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
