<?php

namespace App\Http\Controllers;

use App\Models\LogAktif;
use App\Models\Nota;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $notas = Nota::latest()->get();
        $logs = LogAktif::latest()->limit(8)->get();
        return view('workit.dashboard', [
            'notas' => $notas,
            'logs' => $logs
        ]);
    }
}
