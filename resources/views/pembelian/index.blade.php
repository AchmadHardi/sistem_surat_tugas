@extends('layouts.app')
@section('title',' Pembelian')

@section('contents')
    <script type="text/javascript">
        function submitForm(argument) {
            // document.getElementById('submit').click();
        }
    </script>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <span class="float-right"><a href="{{route('pembelian.history')}}">History</a></span>
            <h6 class="m-0 font-weight-bold text-primary">Pembelian Tiket</h6>
        </div>
        <div class="card-body">
            <div style="display: flex">
            <div class="col">
                <form action="" method="GET">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-8">
                                <select name="current" class="form-control" id="current" onchange="submitForm()">
                                    <option selected disabled>--Pilih Surat Tugas--</option>
                                    @foreach($surat_tugas as $st)
                                    <option value="{{ $st->id }}" {{ @$current == $st->id ? 'selected' : '' }}>{{ $st->no_st }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <button id="submit" type="submit" class="btn btn-primary mb-3 float-right">Cari Tiket</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col"></div>
            <div class="col"></div>
            </div>
            @if (@$current !== null)
            <div class="row">
                @foreach($tiket as $t)

                <div class="col-md-4 col-xs-12 p-3">
                    <div class="card p-3">
                        <h2>{{ $t->nama_maskapai }}</h2>
                        <p class="text-muted">{{ $t->tgl_pergi." ".$t->tgl_tiba }}</p>
                        <p>Rp. {{ $t->harga }}</p>
                        <p><a href="{{ route('pembelian.assign' , [$t->id,@$current]) }}">Pesan</a></p>
                    </div>
                </div>
                @endforeach

            </div>
            @endif
            
            
        </div>
    </div>
@endsection