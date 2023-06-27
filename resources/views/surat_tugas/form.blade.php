@extends('layouts.app')

@section('title', 'Surat Tugas')

@section('contents')

<form action="" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">{{ isset($surat_tugas[0]) ? 'Form Edit surat_tugas' : 'Form Tambah surat_tugas' }}</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="kode_employee">Karyawan</label>
                        <select class="form-control" name="id_karyawan" id="id_karyawan">
                            <option selected disabled>--Pilih Karyawan--</option>
                            @foreach($employee as $emp)
                            @php
                            //  echo $surat_tugas->id_karyawan;
                            //  echo $emp->id;
                            @endphp
                                <option value="{{ @$emp->id }}" <?php echo isset($surat_tugas) && (@$surat_tugas->id_karyawan == @$emp->id) ? ' selected ' : '' ?> >{{ @$emp->name }}</option>
                            @endforeach
                        </select>
                    </div>      
                    <div class="form-group">
                        <label for="tgl_pergi">Tanggal Pergi</label>
                        <input type="date" class="form-control" name="tgl_pergi" id="tgl_pergi" value="{{ isset($surat_tugas) && $surat_tugas->tgl_pergi ? $surat_tugas->tgl_pergi : '' }}">
                    </div>
                                   
                    <div class="form-group">
                        <label for="tgl_pulang">Tanggal Pulang</label>
                        <input type="date" class="form-control" name="tgl_pulang" id="tgl_pulang" value="{{ isset($surat_tugas) ? $surat_tugas->tgl_pulang : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="asal">Asal</label>
                        <input type="text" class="form-control" name="asal" id="asal" value="{{ isset($surat_tugas) ? $surat_tugas->asal : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="tujuan  ">Tujuan</label>
                        <input type="text" class="form-control" name="tujuan" id="tujuan" value="{{ isset($surat_tugas) ? $surat_tugas->tujuan : '' }}">
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
