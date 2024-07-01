@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="container">
            <h3>Data Nilai {{ Auth::user()->siswa->nama }} - ({{ Auth::user()->siswa->kelas->nama_kelas }})</h3>
            <hr>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Siswa</th>
                            <th scope="col">Nilai</th>
                            <th scope="col">Semester</th>
                            <th scope="col">Tahun Ajaran</th>
                            <th scope="col">Mata Pelajaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($mataPelajaran as $mapel)
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
                                    <td>{{ $mapel->nama_matapelajaran }}</td>
                                </tr>
                            @endforeach
                            @endforeach 
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
