<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratTugas;
use App\Models\Pembelian;
use App\Models\Employee;
use App\Models\Tiket;

class PembelianController extends Controller{
    public function index() {
        $current = @$_GET['current'];

        $SuratTugas = SuratTugas::join('employees as e', 'surat_tugas.id_karyawan', '=', 'e.id')
            ->join('jabatans', 'e.jabatan_id', '=', 'jabatans.id')
            ->where('surat_tugas.is_assign', '!=', '1')
            ->select('surat_tugas.*', 'e.name as nama_karyawan', 'e.jabatan_id as jabatan_karyawan', 'e.id as id_karyawan', 'surat_tugas.id as id', 'surat_tugas.no_st', 'jabatans.class')
            ->get();
        
        $Tiket = Tiket::where('status', '!=', 'sold_out')
            ->when(!$SuratTugas->isEmpty(), function ($query) use ($SuratTugas) {
                return $query->where('kelas', $SuratTugas->first()->class);
            })
            ->get();
        
        return view('pembelian/index', ['surat_tugas' => $SuratTugas, 'tiket' => $Tiket, 'current' => @$current]);
        
    }
    public function history($id = null)
    {
        if ($id == null) {
            $Pembelian = Pembelian::join('employees as e', 'pembelian.id_karyawan', '=', 'e.id')
            ->join('tikets as t', 'pembelian.id_tiket', '=', 't.id')
            ->where(['pembelian.status'=>'1'])
            ->select('pembelian.*','e.name as nama_karyawan','t.nama_maskapai','t.tujuan','t.asal','t.tgl_pergi','t.tgl_pulang')
            ->get();
        }else{
            $Pembelian = Pembelian::join('employees as e', 'pembelian.id_karyawan', '=', 'e.id')
            ->join('tikets as t', 'pembelian.id_tiket', '=', 't.id')
            ->where(['pembelian.status'=>'1','pembelian.id_karyawan'=>$id])
            ->select('pembelian.*','e.name as nama_karyawan','t.nama_maskapai','t.tujuan','t.asal','t.tgl_pergi','t.tgl_pulang')
            ->get();
        }
        return view('pembelian/history', ['pembelian' => $Pembelian]);
    }
    public function assign($id, $current)
    {
        $SuratTugas     = SuratTugas::where(['id' => $current])->first();
        $id_tiket       = $id;
        $id_karyawan    = $SuratTugas->id_karyawan;
        $Employee       = Employee::find($id_karyawan)->first();
        $id_atasan      = $Employee->jabatan_id;
    
        Pembelian::create([
            'id_karyawan'   => $id_karyawan, 
            'id_atasan'     => $id_atasan, 
            'id_tiket'      => $id_tiket, 
            'id_surat_tugas'=> $current, 
            'status'        => '1',
        ]);
    
        $tiket = Tiket::find($id_tiket);
    
        if ($tiket->jumlah_kursi > 0) {
            $tiket->decrement('jumlah_kursi');
    
            if ($tiket->jumlah_kursi == 0) {
                $tiket->update(['status' => 'sold_out']);
            }
        }
    
        SuratTugas::where(['id' => $current])->update(['is_assign' => '1']);
    
        return redirect()->route('pembelian.history');
    }
    
    public function delete($id)
    {
        $Pembelian = Pembelian::findOrFail($id);
        $id_tiket = $Pembelian->id_tiket;
    
        // Temukan tiket terkait
        $tiket = Tiket::find($id_tiket);
    
        // Tambahkan jumlah kursi tiket dengan satu
        $tiket->increment('jumlah_kursi');
    
        // Perbarui status tiket menjadi "aktif"
        $tiket->update(['status' => 'aktif']);
    
        // Hapus pembelian
        $Pembelian->delete();
    
        return redirect()->route('pembelian');
    }
    
}
