@extends('layouts.app')

@section('title',' Pembelian')

@section('contents')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">History Pembelian</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Karyawan</th>
                            <th>Nama Maskapai</th>
                            <th>Tgl Pergi</th>
                            <th>Tgl Pulang</th>
                            <th>Asal</th>
                            <th>tujuan</th>
                            <th>Atasan</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @php ($no = 1)
                        @foreach ($pembelian as $row)
                        <?php
                        ?>
                            <tr>
                                <th>{{ $no ++ }}</th>
                                <td>{{ $row->nama_karyawan }}</td>
                                <td>{{ $row->nama_maskapai}}</td>
                                <td>{{ $row->tgl_pergi}}</td>
                                <td>{{ $row->tgl_pulang}}</td>
                                <td>{{ $row->asal }}</td>
                                <td>{{ $row->tujuan }}</td>
                                <td>
                                    <a href="{{ route('pembelian.print' , $row->id) }}"  class="btn btn-info" hidden>Print</a> 
                                    <a href="{{ route('pembelian.delete' , $row->id) }}"  class="btn btn-danger">Hapus</a>                                
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection