<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            "title" => 'Selamat Datang',
            "list" => ['Home', 'Welcome']
        ];
    
        $activeMenu = "dashboard-beranda";
    
        return view('mahasiswa.dashboard', [ 
            'breadcrumb' => $breadcrumb,
            'activeMenu' => $activeMenu
        ]);
    }
    
}
