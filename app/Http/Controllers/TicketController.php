<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Status;

class TicketController extends Controller
{
    public function index()
    {
        $tiket = Ticket::get();

        return view('tiket/index', ['tiket' => $tiket]);
    }

    public function tambah()
    {
        $employee = Employee::all();
        $statuses = Status::all();
        return view('tiket.form', ['employee' => $employee, 'statuses' => $statuses]);
    }

    public function simpan(Request $request)
    {
        $karyawan = Employee::findOrFail($request->id_karyawan)->first();
        $kelas = '';

        Ticket::create([

            'nama_maskapai' => $request->nama_maskapai,
            'harga' => $request->harga,
            'jumlah_kursi' => $request->jumlah_kursi,
            'kelas' => $kelas,
            'asal' => $request->asal,
            'tujuan' => $request->tujuan,
            'jam_berangkat' => str_replace(" ", "", $request->tanggal_berangkat) . " " . str_replace(" ", "", $request->jam_berangkat),
            'jam_tiba' => str_replace(" ", "", $request->tanggal_tiba) . " " . str_replace(" ", "", $request->jam_tiba),
            'status' => $request->status,
        ]);

        return redirect()->route('tiket');
    }

    public function edit($id)
    {
        $tiket = Ticket::find($id);

        return view('tiket.form', ['tiket' => $tiket]);
    }

    public function update($id, Request $request)
    {

        Ticket::find($id)->update([
            'nama_maskapai' => $request->nama_maskapai,
            'harga' => $request->harga,
            'jumlah_kursi' => $request->jumlah_kursi,
            'kelas' => $request->kelas,
            'asal' => $request->asal,
            'tanggal' => $request->tanggal,
            'tujuan' => $request->tujuan,
            'jam_berangkat' => $request->tanggal_berangkat . " " . $request->jam_berangkat,
            'jam_tiba' => $request->tanggal_tiba . " " . $request->jam_tiba,
            'status' => $request->status,
        ]);

        return redirect()->route('tiket');
    }
    public function print($id)
    {
        // $tiket = SuratTugas::('tikets', 'surat_tugas.id_tiket', '=', 'tikets.id')
        // ->join('employees', 'employees.id', '=', 'surat_tugas.id_karyawan')
        // ->where(['surat_tugas.id_tiket'=>$id])
        // ->first();
        // print_r($tiket);exit;
        // Lakukan logika lain yang diperlukan untuk persiapan cetak

        // return view('tiket.print', ['tiket' => $tiket]);
    }
}
