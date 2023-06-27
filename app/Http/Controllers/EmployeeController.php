<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Jabatan;
use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert as SweetAlert;

class EmployeeController extends Controller
{
    public function index()
    {
        $employee =Employee::join('jabatans', 'employees.jabatan_id', '=', 'jabatans.id')
        ->select('employees.*', 'jabatans.name as jabatan_name')
        ->get();
        
        return view('employee.index', ['employee' => $employee]);
    }

    public function tambah()
    {
        $atasan = Employee::get();
        $jabatan = Jabatan::get();
      
        return view('employee.form', ['atasan' => $atasan, 'jabatan' => $jabatan]);

        return view('employee.form', [
            'positions' => Position::get()
        ]);

    }

    public function simpan(Request $request)
    {
        Employee::create($request->all());
        // return dd($request->all());

        return redirect()->route('employee');
    }

    public function edit($id)
    {

        $employee = Employee::where(['id'=>$id])->first();
        $atasan = Employee::get();
        $jabatan = Jabatan::get();

        return view('employee.form',['employee' => $employee,'atasan' => $atasan,'jabatan' => $jabatan]);

        $employee = Employee::find($id);
        $positions = Position::get();

        return view('employee.form', ['employee' => $employee, 'positions' => $positions]);

    }

    public function update($id, Request $request)
    {
        Employee::find($id)->update([
            'name' => $request->name, 
            'nik' => $request->nik, 
            'jabatan_id' => $request->jabatan_id,  
            'email' => $request->email]);
            SweetAlert::success('Success', 'Karyawan Berhasil Diubah');   

        Employee::find($id)->update($request->all());


        return redirect()->route('employee');
    }

    public function hapus($id)
    {
        $employee = Employee::findOrFail($id);

        $employee->delete();
        SweetAlert::success('Success', 'Karyawan Berhasil DiHapus');
        return redirect()->back();
    }
}
