@extends('layouts.app')

@section('title', 'Form employee')

@section('contents')

<form action="" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">{{ isset($employee[0]) ? 'Form Edit employee' : 'Form Tambah employee' }}</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="kode_employee">NIK</label>
                        <input type="number" class="form-control" name="nik" id="nik" value="{{ isset($employee) ? $employee->nik : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="name">Nama </label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ isset($employee) ? $employee->name : '' }}">
                    </div>
                    <div class="form-group">
                      <label for="jabatan">Jabatan</label>
                        <select class="form-control" name="jabatan_id" id="jabatan_id">
                            @foreach($jabatan as $j)
                                <option value="{{ $j->id }}">{{ $j->name }}</option>
                        <label for="position_id">Jabatan</label>
                        <select class="form-control" name="position_id" id="position_id">
                            @foreach ($positions as $position)
                            <option value='{{ $position->id }}'>{{$position->name}}</option>

                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" value="{{ isset($employee) ? $employee->email : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        @if(isset($employee))
                            <input type="password" class="form-control" name="password" id="password" disabled>
                        @else
                            <input type="password" class="form-control" name="password" id="password">
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="atasan">Atasan</label>
                        <select class="form-control" disabled name="atasan" id="atasan">
                            <option selected disabled>--Pilih Atasan--</option>
                            @foreach($atasan as $at)
                            <option value="{{ $at->id }}" {{ @$employee->atasan == $at->id ? 'selected' : '' }}>{{ $at->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection