<?php

namespace App\Http\Controllers\Pelanggan;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class DashboardController extends Controller
{

    public function index()
    {
        return Inertia::render('Pelanggan/Dashboard/Index');
    }
}
