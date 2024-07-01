@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="container">
            <h3>Data Mata Pelajaran</h3>
            <hr>
            <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#addDivision">Tambah
                MaPel</button>
            <div class="table-responsive">
                <table class="table table-borderless">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Mata Pelajaran</th>
                            <th scope="col">Jadwal</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($mapel as $row)
                            <tr>
                                <th scope="row">{{ $no++ }}</th>
                                <td>{{ $row->nama_matapelajaran }}</td>
                                <td>{{ $row->jadwal }}</td>
                                <td>{{ $row->kelas->nama_kelas }}</td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#update{{ $row->id }}">Update</button>
                                    <a href="{{ route('guru.deleteMapel', ['id' => $row->id]) }}"
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
                                                    <form method="POST"
                                                        action="{{ route('mata_pelajaran.update', $row->id) }}">
                                                        @csrf

                                                        <div class="form-group">
                                                            <label for="kelas_id">Kelas</label>
                                                            <select id="kelas_id"
                                                                class="form-control @error('kelas_id') is-invalid @enderror"
                                                                name="kelas_id" required>
                                                                <option value="">Pilih Kelas</option>
                                                                @foreach ($kelas as $kelasItem)
                                                                    <option value="{{ $kelasItem->id }}"
                                                                        {{ $row->kelas_id == $kelasItem->id ? 'selected' : '' }}>
                                                                        {{ $kelasItem->nama_kelas }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('kelas_id')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="nama_matapelajaran">Nama Mata Pelajaran</label>
                                                            <input id="nama_matapelajaran" type="text"
                                                                class="form-control @error('nama_matapelajaran') is-invalid @enderror"
                                                                name="nama_matapelajaran"
                                                                value="{{ $row->nama_matapelajaran }}" required
                                                                autocomplete="nama_matapelajaran" autofocus>
                                                            @error('nama_matapelajaran')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="jadwal">Jadwal</label>
                                                            <input id="jadwal" type="text"
                                                                class="form-control @error('jadwal') is-invalid @enderror"
                                                                name="jadwal" value="{{ $row->jadwal }}"
                                                                required autocomplete="jadwal">
                                                            @error('jadwal')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>

                                                        <button type="submit" class="btn btn-primary">Update</button>
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
                    <h4 class="modal-title" id="standard-modalLabel">Tambah Mata Pelajaran</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('guru.mapelPost') }}">
                        @csrf

                        <div class="form-group">
                            <label for="kelas_id">Kelas</label>
                            <select id="kelas_id" class="form-control @error('kelas_id') is-invalid @enderror"
                                name="kelas_id" required>
                                <option value="">Pilih Kelas</option>
                                @foreach ($kelas as $kelasItem)
                                    <option value="{{ $kelasItem->id }}"
                                        {{ old('kelas_id') == $kelasItem->id ? 'selected' : '' }}>
                                        {{ $kelasItem->nama_kelas }}</option>
                                @endforeach
                            </select>
                            @error('kelas_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="nama_matapelajaran">Nama Mata Pelajaran</label>
                            <input id="nama_matapelajaran" type="text"
                                class="form-control @error('nama_matapelajaran') is-invalid @enderror"
                                name="nama_matapelajaran" value="{{ old('nama_matapelajaran') }}" required
                                autocomplete="nama_matapelajaran" autofocus>
                            @error('nama_matapelajaran')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="jadwal">Jadwal</label>
                            <input id="jadwal" type="text"
                                class="form-control @error('jadwal') is-invalid @enderror" name="jadwal"
                                value="{{ old('jadwal') }}" required autocomplete="jadwal">
                            @error('jadwal')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection
