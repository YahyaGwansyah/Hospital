<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $data = [
            'title'         => 'Dashboard',
            // 'contoh'        => User::count(),
            'content'       => 'dashboard/index',
        ];
        return view("admin.layouts.wrapper", $data);
    }
}
