@extends('layouts.app')

@section('title','Data Karyawan')
@php
use App\Models\Employee;

@endphp
@section('contents')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Karyawan</h6>
        </div>
        <div class="card-body">
            <a href="{{ route('employee.tambah') }}" class="btn btn-primary mb-3">Tambah Karyawan</a>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nik</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Atasan</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php ($no = 1)
                        @foreach ($employee as $row)
                            <tr>
                                <th>{{ $no ++ }}</th>
                                <td>{{ $row->nik }}</td>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->jabatan_name}}</td>
                                <td>{{ $row->jabatan_id }}</td>
                                <td>{{ $row->email}}</td>
                                <td>
                                    <a href="{{ route('employee.edit' , $row->id) }}" class="btn btn-warning">Edit</a>
                                    <a href="{{ route('employee.hapus' , $row->id) }}"  class="btn btn-danger">Hapus</a>                                
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection