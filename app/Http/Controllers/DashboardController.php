<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        return view('dashboard.index');
    }
    public function table(){
        return view('dashboard.table');
    }
    public function form(){
        return view('dashboard.form');
    }
}
