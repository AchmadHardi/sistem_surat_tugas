<?php

namespace App\Http\Controllers;
use App\Models\Tiket;

use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index($id = null)
    {
        if($id==null){
            $data = Tiket::all();
        }else{
            $data = Tiket::where(['id_karyawan'=>$id])->get();
        }
        return view('history.index',['data'=>$data]);
    }
}
