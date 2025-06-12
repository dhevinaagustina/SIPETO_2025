<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            "title" => __('mahasiswa.dashboard.welcome'),
            "list" => [
                __('mahasiswa.dashboard.breadcrumb.menu'),
                __('mahasiswa.dashboard.breadcrumb.home')
            ]
        ];
    
        $activeMenu = "dashboard-beranda";
    
        return view('mahasiswa.dashboard', [ 
            'breadcrumb' => $breadcrumb,
            'activeMenu' => $activeMenu
        ]);
    }
}
