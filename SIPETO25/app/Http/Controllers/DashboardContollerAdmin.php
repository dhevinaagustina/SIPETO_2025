<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardControllerAdmin extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            "title" => 'Selamat Datang',
            "list" => ['Home', 'Welcome']
        ];
    
        $activeMenu = "dashboard";
    
        return view('admin.dashboard', [ 
            'breadcrumb' => $breadcrumb,
            'activeMenu' => $activeMenu
        ]);
    }
    
}
