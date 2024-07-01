@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="container">
            <h3>Data Jadwal ({{ $kelas->nama_kelas }})</h3>
            <hr>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Mata Pelajaran</th>
                            <th scope="col">Jadwal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($mataPelajaran as $mapel)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $mapel->nama_matapelajaran }}</td>
                                    <td>{{ $mapel->jadwal }}</td>
                                </tr>
                            @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
