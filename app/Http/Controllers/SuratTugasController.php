<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\SuratTugas;
use App\Models\Employee;
use App\Models\Tiket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuratTugasController extends Controller
{
    public function index()
    {
        // $surat_tugas = SuratTugas::
        // join('employees as e', 'surat_tugas.id_karyawan', '=', 'e.id')
        // ->join('jabatans as j', 'e.jabatan_id', '=', 'j.id')
        // ->join('tikets as t', 'surat_tugas.id_tiket', '=', 't.id')
        // ->select('e.*', 'j.name as jabatan_name', 't.tgl_pergi', 't.tgl_pulang', 't.asal', 't.tujuan')
        // ->get();
        $surat_tugas = SuratTugas::
        join('employees as e', 'surat_tugas.id_karyawan', '=', 'e.id')
        ->select('e.*','surat_tugas.*','e.name as nama_karyawan')
        ->get();
        // $surat_tugas = SuratTugas::all();
        $tiket = Tiket::all();
        // echo $surat_tugas;exit;
     return view('surat_tugas/index', ['surat_tugas' => $surat_tugas,'tiket' => $tiket]);


    }

    public function tambah()
    {
        $employee   = Employee::where('atasan',Auth::user()->id)->get();
        $tiket      = Tiket::all();
     return view('surat_tugas.form',['employee'=>$employee,'tiket'=>$tiket]);
    }

    public function simpan(Request $request)
    {
        $tgl_pergi = $request->tgl_pergi;
        $tgl_pulang = $request->tgl_pulang;
        SuratTugas::create([
            'id_karyawan' => $request->id_karyawan, 
            'no_st' => $this->getNoST(),
            'tgl_pergi' => $tgl_pergi, 
            'tgl_pulang' => $tgl_pulang,
            'asal' => $request->asal,
            'tujuan' => $request->tujuan
        ]);
        // if($request->status=='aktif'){
        //     Tiket::find($request->id_tiket)->update(['status' => 'sold_out']);
        // }else{
        //     Tiket::find($request->id_tiket)->update(['status' => 'aktif']);
        // }
        return redirect()->route('surat_tugas');
    }

    public function edit($id)
    {
        $surat_tugas = SuratTugas::find($id);
        $employee = Employee::all();
        $tiket = Tiket::all();
        return view('surat_tugas.form', ['surat_tugas' => $surat_tugas, 'employee' => $employee, 'tiket' => $tiket]);
        
    }

    public function update($id, Request $request)
    {
        $suratTugas = SuratTugas::find($id);
        if ($suratTugas) {
            $suratTugas->update([
                'id_karyawan' => $request->id_karyawan, 
                'tgl_pergi' => $request->tgl_pergi, 
                'tgl_pulang' => $request->tgl_pulang, 
                'asal' => $request->asal,
                'tujuan' => $request->tujuan
            ]);
        }
    
        $tiket = Tiket::find($request->id_tiket);
        if ($tiket) {
            if ($request->status == 'aktif') {
                $tiket->update(['status' => 'sold_out']);
            } else {
                $tiket->update(['status' => 'aktif']);
            }
        }
    
        return redirect()->route('surat_tugas');
    }
    

    public function print($id)
    {
        $tiket = SuratTugas::find($id)->first();
        $employee = Employee::find($tiket->id_karyawan)->first();
        // Lakukan logika lain yang diperlukan untuk persiapan cetak
        
        return view('surat_tugas.print', ['tiket' => $tiket,'employee' => $employee]);
    }

    public function hapus($id)
    {
        $employee = Employee::findOrFail($id);

        $employee->delete();

        return redirect()->back();
    }

    public function getbyclass($kelas)
    {
        echo Tiket::where('kelas', $kelas)->toArray()->get();exit;
    }

    private function getNoST()
    {
        $surat_tugas = SuratTugas::max('id');
        return ++$surat_tugas . '-ST-' . date('Y');
    }
}


