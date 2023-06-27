<?php

namespace App\Http\Controllers;

use App\Models\SuratTugas;
use App\Models\Employee;
use App\Models\Tiket;
use App\Models\Jabatan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert as SweetAlert;
class TiketController extends Controller
{
    public function index()
    {
     $tiket = Tiket::get();
 
     return view('tiket/index', ['tiket' => $tiket]);
    }
 
    public function tambah()
    {
        $employee = Employee::all();
        $jabatan = Jabatan::all();
        $tiket = Tiket::all();
     return view('tiket.form',['employee'=>$employee,'tiket'=>$tiket, 'jabatan'=>$jabatan]);
    }
 
    public function simpan(Request $request)
    {
        // // print_r($request);exit;
        // echo $karyawan =Employee::where('employees.id',$request->id_karyawan)
        // ->join('jabatans', 'employees.jabatan_id', '=', 'jabatans.id')
        // ->select('employees.*', 'jabatans.name as jabatan_name')
        // // ->get();
        // ->toSql();
        // exit;
        // // $karyawan = Employee::where($request->id_karyawan)->get();
        // $kelas = '';
        // if(!empty($karyawan)){

        // // 'Direktur','Supervisor','Manager','Staff'
        // switch ($karyawan->jabatan_name) {
        //     case 'Direktur':
        //         $kelas = 'First Class';
        //         break;
        //     case 'Manager':
        //         $kelas = 'Bisnis';
        //         break;
        //     case 'Supervisor':
        //         $kelas = 'Ekonomi Premium';
        //         break;
        //     case 'Staff':
        //         $kelas = 'Ekonomi';
        //         break;
        //     default:
        //         break;
        // }
                // echo $request->tanggal_berangkat;exit;
        $tgl_pergi = $request->input('tgl_pergi');
        $tgl_pulang = $request->input('tgl_pulang');
        Tiket::create([
          
            'nama_maskapai' => $request->nama_maskapai, 
            'harga' => $request->harga,
            'jumlah_kursi' => $request->jumlah_kursi, 
            'kelas' => substr($request->kelas, 0, 10), // Trim the value to maximum 10 characters
            'asal' => $request->asal,
            'tujuan' => $request->tujuan, 
            'asal' => $request->asal,
            'tgl_pergi' => $tgl_pergi,
            'tgl_pulang' => $tgl_pulang,         
        ]);
    // }
        SweetAlert::success('Success', 'Tiket Berhasil Ditambahkan');      
        return redirect()->route('tiket');
    }
    
    public function edit($id)
    {
     $tiket = Tiket::find($id);
     $kelasOptions = [
         'First_Class' => 'First class',
         'Bisnis' => 'Bisnis',
         'Ekonomi_Premium' => 'Ekonomi Premium',
         'Ekonomi' => 'Ekonomi'
     ];
 
     return view('tiket.form', compact('tiket', 'kelasOptions'));
    }
 
    public function update($id, Request $request)
    {
 
        Tiket::find($id)->update([
            'nama_maskapai' => $request->nama_maskapai, 
            'harga' => $request->harga,
            'jumlah_kursi' => $request->jumlah_kursi, 
            'kelas' => substr($request->kelas, 0, 10), // Trim the value to maximum 10 characters
            'asal' => $request->asal,
            'tujuan' => $request->tujuan, 
            'asal' => $request->asal,
            'tgl_pergi' => $request->tgl_pergi, 
            'tgl_pulang' => $request->tgl_pulang, 
        ]);
        SweetAlert::success('Success', 'Tiket Berhasil Diubah');   
        return redirect()->route('tiket');
 
    }
    public function print($id)
    {
        $tiket = Tiket::find($id);
        // Lakukan logika lain yang diperlukan untuk persiapan cetak
    
        return view('tiket.print', ['tiket' => $tiket]);
    }

    public function hapus($id)
    {
        $tiket = Tiket::findOrFail($id);

        $tiket->delete();
        SweetAlert::success('Success', 'Tiket Berhasil DiHapus');
        return redirect()->back();
    }
    
}
