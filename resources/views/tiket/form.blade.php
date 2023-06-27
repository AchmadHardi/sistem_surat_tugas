@extends('layouts.app')

@section('title', 'Form Tiket')

@section('contents')
<?php
    if (isset($tiket->jam_berangkat)) {
        $jb = explode(" ",$tiket->jam_berangkat);
    }
    if (isset($tiket->jam_tiba)) {
        $jt = explode(" ",$tiket->jam_tiba);
    }  
?>
<form action="{{url('/tiket/tiket/edit/'.$tiket->id)}}" method="post">
    @csrf
    @method('POST')
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">{{ isset($tiket[0]) ? 'Form Edit tiket' : 'Form Tambah tiket' }}</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Nama Maskapai</label>
                        <input type="text" class="form-control" name="nama_maskapai" id="nama_maskapai" value="{{ isset($tiket->nama_maskapai) ? $tiket->nama_maskapai : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="moda">harga</label>
                        <input type="text" class="form-control" name="harga" id="harga" value="{{ isset($tiket->harga) ? $tiket->harga : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Tanggal Pergi</label>
                        <input type="date" class="form-control" name="tgl_pergi" id="tgl_pergi " value="{{ isset($tiket->tgl_pergi) ?  $tiket->tgl_pergi: '' }}">
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Tanggal Pulang</label>
                        <input type="date" class="form-control" name="tgl_pulang" id="tgl_pulang " value="{{ isset($tiket->tgl_pulang) ?  $tiket->tgl_pulang : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Asal</label>
                        <input type="text" class="form-control" name="asal" id="asal" value="{{ isset($tiket->asal) ? $tiket->asal : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Tujuan</label>
                        <input type="text" class="form-control" name="tujuan" id="tujuan" value="{{ isset($tiket->tujuan) ? $tiket->tujuan : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah Kursi</label>
                        <input type="number" class="form-control" name="jumlah_kursi" id="jumlah_kursi" value="{{ isset($tiket->jumlah_kursi) ? $tiket->jumlah_kursi : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <select class="form-control" name="kelas" id="kelas">
                            <option selected disabled>--Pilih Kelas--</option>
                            <option value="first_class" {{ old('kelas', $tiket->kelas) === 'first_class' ? 'selected' : '' }}>First class</option>
                            <option value="bisnis" {{ old('kelas', $tiket->kelas) === 'bisnis' ? 'selected' : '' }}>Bisnis</option>
                            <option value="ekonomi_premium" {{ old('kelas', $tiket->kelas) === 'ekonomi_premium' ? 'selected' : '' }}>Ekonomi Premium</option>
                            <option value="ekonomi" {{ old('kelas', $tiket->kelas) === 'ekonomi' ? 'selected' : '' }}>Ekonomi</option>
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
