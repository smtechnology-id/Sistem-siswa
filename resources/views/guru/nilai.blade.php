@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="container">
            <h3>Data Nilai Siswa</h3>
            <hr>
            @foreach ($mataPelajaran as $mapel)
                <h4>{{ $mapel->nama_matapelajaran }}</h4>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Siswa</th>
                                <th scope="col">Nilai</th>
                                <th scope="col">Semester</th>
                                <th scope="col">Tahun Ajaran</th>
                                <th scope="col">Aksi</th>
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
                                    @php
                                        $nilai = $row->nilai->where('matapelajaran_id', $mapel->id)->first();
                                    @endphp
                                    <td>{{ $nilai ? $nilai->nilai : 'N/A' }}</td>
                                    <td>{{ $nilai ? $nilai->semester : 'N/A' }}</td>
                                    <td>{{ $nilai ? $nilai->tahun_ajaran : 'N/A' }}</td>
                                    <td>
                                        @if ($nilai === null)
                                            <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal"
                                                data-bs-target="#addNilai{{ $mapel->nama_matapelajaran }}{{ $row->id }}">Tambah
                                                Nilai
                                            </button>
                                            <div id="addNilai{{ $mapel->nama_matapelajaran }}{{ $row->id }}"
                                                class="modal fade" tabindex="-1" role="dialog"
                                                aria-labelledby="standard-modalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="standard-modalLabel">Tambah Mata
                                                                Pelajaran</h4>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="POST" action="{{ route('guru.addNilai') }}">
                                                                @csrf

                                                                <div class="form-group">
                                                                    <input type="hidden" name="siswa_id"
                                                                        value="{{ $row->id }}">
                                                                    <input type="hidden" name="matapelajaran_id"
                                                                        value="{{ $mapel->id }}">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="nilai">Nilai</label>
                                                                    <input id="nilai" type="text"
                                                                        class="form-control @error('nilai') is-invalid @enderror"
                                                                        name="nilai" value="{{ old('nilai') }}"
                                                                        required>
                                                                    @error('nilai')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="semester">Semester</label>
                                                                    <input id="semester" type="text"
                                                                        class="form-control @error('semester') is-invalid @enderror"
                                                                        name="semester" value="{{ old('semester') }}"
                                                                        required>
                                                                    @error('semester')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="tahun_ajaran">Tahun Ajaran</label>
                                                                    <input id="tahun_ajaran" type="text"
                                                                        class="form-control @error('tahun_ajaran') is-invalid @enderror"
                                                                        name="tahun_ajaran"
                                                                        value="{{ old('tahun_ajaran') }}" required>
                                                                    @error('tahun_ajaran')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>

                                                                <button type="submit"
                                                                    class="btn btn-primary">Simpan</button>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-light"
                                                                data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <button type="button" class="btn btn-warning mb-2" data-bs-toggle="modal"
                                                data-bs-target="#update{{ $mapel->nama_matapelajaran }}{{ $row->id }}">Update
                                                Nilai
                                            </button>
                                            <div id="update{{ $mapel->nama_matapelajaran }}{{ $row->id }}"
                                                class="modal fade" tabindex="-1" role="dialog"
                                                aria-labelledby="standard-modalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="standard-modalLabel">Update Mata
                                                                Pelajaran</h4>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="POST" action="{{ route('guru.updateNilai') }}">
                                                                @csrf

                                                                <div class="form-group">
                                                                    <input type="hidden" name="siswa_id"
                                                                        value="{{ $row->id }}">
                                                                    <input type="hidden" name="matapelajaran_id"
                                                                        value="{{ $mapel->id }}">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="nilai">Nilai</label>
                                                                    <input id="nilai" type="text"
                                                                        class="form-control @error('nilai') is-invalid @enderror"
                                                                        name="nilai" value="{{ $nilai->nilai }}"
                                                                        required>
                                                                    @error('nilai')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="semester">Semester</label>
                                                                    <input id="semester" type="text"
                                                                        class="form-control @error('semester') is-invalid @enderror"
                                                                        name="semester" value="{{ $nilai->semester }}"
                                                                        required>
                                                                    @error('semester')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="tahun_ajaran">Tahun Ajaran</label>
                                                                    <input id="tahun_ajaran" type="text"
                                                                        class="form-control @error('tahun_ajaran') is-invalid @enderror"
                                                                        name="tahun_ajaran"
                                                                        value="{{ $nilai->tahun_ajaran }}" required>
                                                                    @error('tahun_ajaran')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>

                                                                <button type="submit"
                                                                    class="btn btn-primary">Simpan</button>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-light"
                                                                data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endforeach
        </div>
    </div>
@endsection
