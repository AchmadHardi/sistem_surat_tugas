@extends('layouts.app')

@section('title','Data Tiket')

@section('contents')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Tiket</h6>
        </div>
        <div class="card-body">
            <a href="{{ route('tiket.tambah') }}" class="btn btn-primary mb-3">Tambah Tiket</a>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Maskapai</th>
                            <th>Harga</th>
                            <th>Tgl Pergi</th>
                            <th>Tgl Pulang</th>
                            <th>Asal</th>
                            <th>Tujuan</th>
                            <th>Jumlah Kursi</th>
                            <th>Kelas</th> 
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php ($no = 1)
                        @foreach ($tiket as $row)
                            <tr>
                                <th>{{ $no ++ }}</th>
                                <td>{{ $row->nama_maskapai }}</td>
                                <td>{{ $row->harga}}</td>
                                <td>{{ $row->tgl_pergi}}</td>
                                <td>{{ $row->tgl_pulang}}</td>
                                <td>{{ $row->asal }}</td>
                                <td>{{ $row->tujuan }}</td>
                                <td>{{ $row->jumlah_kursi }}</td>
                                <td>{{ $row->kelas }}</td>
                                <td>
                                    <a href="{{ route('tiket.edit' , $row->id) }}" class="btn btn-warning">Edit</a>
                                    <a href="{{ route('tiket.print' , $row->id) }}"  class="btn btn-info">Print</a> 
                                    <a href="{{ route('tiket.hapus' , $row->id) }}"  class="btn btn-danger">Hapus</a>                                
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection