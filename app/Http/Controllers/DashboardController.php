<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class DashboardController extends Controller
{
    //
    public function index()
    {
        //ambil data data untuk ditampilkan di card pada dashboard
        $data = User::all();
        
        return view('admin/dashboard', compact('data'));
    }
}
