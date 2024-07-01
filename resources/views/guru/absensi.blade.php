@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="container">
            <h3>Data Absensi Kelas {{ $kelas->nama_kelas }}</h3>
            <hr>
            <div class="table-responsive">
                <table class="table table-borderless">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>Jumlah Masuk</th>
                            <th>Jumlah Tidak Masuk</th>
                            <th>Jumlah Ijin</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($siswa as $row)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $row->nama }}</td>
                                <td>{{ $row->absensi ? $row->absensi->jumlah_masuk : 'N/A' }}</td>
                                <td>{{ $row->absensi ? $row->absensi->jumlah_tidak_masuk : 'N/A' }}</td>
                                <td>{{ $row->absensi ? $row->absensi->jumlah_ijin : 'N/A' }}</td>
                                <td>
                                    @if ($row->absensi === null)
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#addAbsensi{{ $row->id }}">Add
                                        </button>
                                    @else
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#updateAbsensi{{ $row->id }}">Update
                                        </button>
                                    @endif

                                    <a href="{{ route('guru.deleteAbsensi', ['id' => $row->absensi ? $row->absensi->id : 0]) }}"
                                        class="btn btn-danger">Delete</a>

                                    <div id="addAbsensi{{ $row->id }}" class="modal fade" tabindex="-1"
                                        role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="standard-modalLabel">Add Absensi</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="POST" action="{{ route('guru.addAbsensi') }}">
                                                        @csrf
                                                        <input type="hidden" name="siswa_id" value="{{ $row->id }}">
                                                        <div class="form-group">
                                                            <label for="jumlah_masuk">Jumlah Masuk</label>
                                                            <input id="jumlah_masuk" type="text" class="form-control"
                                                                name="jumlah_masuk"
                                                                value="{{ $row->absensi ? $row->absensi->jumlah_masuk : old('jumlah_masuk') }}"
                                                                required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="jumlah_tidak_masuk">Jumlah Tidak Masuk</label>
                                                            <input id="jumlah_tidak_masuk" type="text"
                                                                class="form-control" name="jumlah_tidak_masuk"
                                                                value="{{ $row->absensi ? $row->absensi->jumlah_tidak_masuk : old('jumlah_tidak_masuk') }}"
                                                                required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="jumlah_ijin">Jumlah Ijin</label>
                                                            <input id="jumlah_ijin" type="text" class="form-control"
                                                                name="jumlah_ijin"
                                                                value="{{ $row->absensi ? $row->absensi->jumlah_ijin : old('jumlah_ijin') }}"
                                                                required>
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
                                    <div id="updateAbsensi{{ $row->id }}" class="modal fade" tabindex="-1"
                                        role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="standard-modalLabel">Add Absensi</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="POST" action="{{ route('guru.updateAbsensi') }}">
                                                        @csrf
                                                        <input type="hidden" name="siswa_id" value="{{ $row->id }}">
                                                        <div class="form-group">
                                                            <label for="jumlah_masuk">Jumlah Masuk</label>
                                                            <input id="jumlah_masuk" type="text" class="form-control"
                                                                name="jumlah_masuk"
                                                                value="{{ $row->absensi ? $row->absensi->jumlah_masuk : old('jumlah_masuk') }}"
                                                                required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="jumlah_tidak_masuk">Jumlah Tidak Masuk</label>
                                                            <input id="jumlah_tidak_masuk" type="text"
                                                                class="form-control" name="jumlah_tidak_masuk"
                                                                value="{{ $row->absensi ? $row->absensi->jumlah_tidak_masuk : old('jumlah_tidak_masuk') }}"
                                                                required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="jumlah_ijin">Jumlah Ijin</label>
                                                            <input id="jumlah_ijin" type="text" class="form-control"
                                                                name="jumlah_ijin"
                                                                value="{{ $row->absensi ? $row->absensi->jumlah_ijin : old('jumlah_ijin') }}"
                                                                required>
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
@endsection
