@extends('layouts.app')
@php
use App\Models\Employee;
    
@endphp
@section('title',' Surat Tugas')

@section('contents')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Surat Tugas</h6>
        </div>
        <div class="card-body">
            <a href="{{ route('surat_tugas.tambah') }}" class="btn btn-primary mb-3">Tambah Surat</a>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Karyawan</th>
                            <th>Tgl Pergi</th>
                            <th>Tgl Pulang</th>
                            <th>Asal</th>
                            <th>tujuan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php ($no = 1)
                        @foreach ($surat_tugas as $row)
                        <?php
                        ?>
                            <tr>
                                <th>{{ $no ++ }}</th>
                                <td>{{ $row->nama_karyawan }}</td>
                                <td>{{ $row->tgl_pergi}}</td>
                                <td>{{ $row->tgl_pulang}}</td>
                                <td>{{ $row->asal }}</td>
                                <td>{{ $row->tujuan }}</td>
                                <td>
                                    <a href="{{ route('surat_tugas.edit' , $row->id) }}" class="btn btn-warning">Edit</a>
                                    <a href="{{ route('surat_tugas.print' , $row->id) }}"  class="btn btn-info">Print</a> 
                                    <a href="{{ route('surat_tugas.hapus' , $row->id) }}"  class="btn btn-danger">Hapus</a>                                
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection