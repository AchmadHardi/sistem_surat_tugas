@extends('layouts.app')

@section('title', 'Form Barang')

@section('contents')

<form action="" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">{{ isset($barang[0]) ? 'Form Edit Barang' : 'Form Tambah Barang' }}</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="kode_barang">Kode Barang</label>
                        <input type="text" class="form-control" name="kode_barang" id="kode_barang" value="{{ isset($barang[0]) ? $barang[0]->kode_barang : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="nama_barang">Nama Barang</label>
                        <input type="text" class="form-control" name="nama_barang" id="nama_barang" value="{{ isset($barang[0]) ? $barang[0]->nama_barang : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="id_kategori">Kategori Barang</label>
                        <select name="id_kategori" id="id_kategori" class="custom-select">
                            <option value="" selected disabled hidden>---Pilih Kategori---</option>
                            @foreach ($kategori as $row)
                                <option value="{{ $row->id }}" {{ isset($barang[0]) && $barang[0]->id_kategori == $row->id ? 'selected' : '' }}>{{ $row->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="harga_barang">Harga Barang</label>
                        <input type="number" class="form-control" name="harga" id="harga" value="{{ isset($barang[0]) ? $barang[0]->harga : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah Barang</label>
                        <input type="number" class="form-control" name="jumlah" id="jumlah" value="{{ isset($barang[0]) ? $barang[0]->jumlah : '' }}">
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
