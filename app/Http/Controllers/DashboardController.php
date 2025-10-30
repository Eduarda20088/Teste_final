<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Requer login para acessar o dashboard
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Exibe o dashboard
    public function index()
    {
        return view('dashboard');
    }
}
