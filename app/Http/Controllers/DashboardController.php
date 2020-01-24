<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function app(){
        return view('dashboards.app');
    }
    public function index(){
        return view('index');
    }
    public function mutasi(){
        return view('mutasi');
    }
    
}
