@extends('layouts.app')


@section('content')
    <div class="row">
        @foreach ($kelas as $row)
        <div class="col-md-4">
            <div class="card">
                <h5 class="card-header">{{$row->nama_kelas}}</h5>
                <div class="card-body">
                  <p class="card-text"></p>
                  <a href="{{route('guru.showAbsensi', ['id'=> $row['id']])}}" class="btn btn-primary">Data Nilai</a>
                </div>
              </div>
        </div>
        @endforeach
    </div>
@endsection
