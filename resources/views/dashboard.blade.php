@extends('layouts.app')

@section('title','Dashboard')

@section('contents')

    <div class="row">
        <div class="col-md-6">
            <div class="card" style="width: 300px;">
                <div class="card-body">
                    <h5 class="card-title">
                        <span class="float-left">Surat Tugas 1</span>
                        <span class="float-right"><i class="fas fa-envelope"></i></span>
                    </h5>
                </div>
            </div>
        </div>        
        <div class="col-md-6">
            <div class="card" style="width: 300px;">
                <div class="card-body">
                    <h5 class="card-title">
                        <span class="float-left">Tiket Dipesan</span>
                        <span class="float-right"><i class="fas fa-plane"></i> 
                    </h5>
                </div>
            </div>
        </div>
    </div>

@endsection
