<?php

namespace App\Http\Controllers;

use App\Models\Names;
use Illuminate\Http\Request;

class HistoryPembelian extends Controller
{
    public function index()
    {
        $user = Names::find(auth()->id());

        if (!$user) {
            return redirect('/login')->with('error', 'User not found');
        }

        $purchasedTickets = $user->purchasedTickets;

        return view('history-pembelian.index', compact('purchasedTickets'));
    }
}
