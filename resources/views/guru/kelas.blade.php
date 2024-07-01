@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="container">
            <h3>Data Kelas</h3>
            <hr>
            <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#addDivision">Tambah
                Kelas</button>
            <div class="table-responsive">
                <table class="table table-borderless">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Kelas</th>
                            <th scope="col">Tingkat</th>
                            <th scope="col">Nama Guru</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($kelas as $row)
                            <tr>
                                <th scope="row">{{ $no++ }}</th>
                                <td>{{ $row->nama_kelas }}</td>
                                <td>{{ $row->tingkat }}</td>
                                <td>{{ $row->nama_guru }}</td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#update{{ $row->id }}">Update</button>
                                    <a href="{{ route('guru.deleteKelas', ['id' => $row->id]) }}"
                                        class="btn btn-danger">Delete</a>
                                    <div id="update{{ $row->id }}" class="modal fade" tabindex="-1" role="dialog"
                                        aria-labelledby="standard-modalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="standard-modalLabel">Update Kelas</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="POST" action="{{ route('guru.updateKelas') }}">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label for="nama_kelas">Nama Kelas</label>
                                                            <input type="hidden" name="id"
                                                                value="{{ $row->id }}">
                                                            <input id="nama_kelas" type="text"
                                                                class="form-control @error('nama_kelas') is-invalid @enderror"
                                                                name="nama_kelas"
                                                                value="{{ old('nama_kelas', $row->nama_kelas) }}" required
                                                                autocomplete="nama_kelas" autofocus>

                                                            @error('nama_kelas')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="nama_guru">Nama Guru</label>
                                                            <input id="nama_guru" type="text"
                                                                class="form-control @error('nama_guru') is-invalid @enderror"
                                                                name="nama_guru"
                                                                value="{{ old('nama_guru', $row->nama_guru) }}" required
                                                                autocomplete="nama_guru">

                                                            @error('nama_guru')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="tingkat">Tingkat</label>
                                                            <input id="tingkat" type="text"
                                                                class="form-control @error('tingkat') is-invalid @enderror"
                                                                name="tingkat" value="{{ old('tingkat', $row->tingkat) }}"
                                                                required autocomplete="tingkat">

                                                            @error('tingkat')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>

                                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                                    </form>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light"
                                                        data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    <div id="addDivision" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="standard-modalLabel">Tambah User</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('guru.addKelas') }}">
                        @csrf

                        <div class="form-group">
                            <label for="nama_kelas">Nama Kelas</label>
                            <input id="nama_kelas" type="text"
                                class="form-control @error('nama_kelas') is-invalid @enderror" name="nama_kelas"
                                value="{{ old('nama_kelas') }}" required autocomplete="nama_kelas" autofocus>

                            @error('nama_kelas')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="nama_guru">Nama Guru</label>
                            <input id="nama_guru" type="text"
                                class="form-control @error('nama_guru') is-invalid @enderror" name="nama_guru"
                                value="{{ old('nama_guru') }}" required autocomplete="nama_guru">

                            @error('nama_guru')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="tingkat">Tingkat</label>
                            <input id="tingkat" type="text"
                                class="form-control @error('tingkat') is-invalid @enderror" name="tingkat"
                                value="{{ old('tingkat') }}" required autocomplete="tingkat">

                            @error('tingkat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection
