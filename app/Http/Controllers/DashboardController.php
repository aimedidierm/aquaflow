<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use App\Enums\WaterSector;
use App\Models\Consumption;
use App\Models\Distribution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function admin()
    {
        $consumption = Consumption::sum('volume');
        $wasted = Distribution::sum('volume') - Consumption::sum('volume');
        $agriculture = Consumption::where('sector', WaterSector::AGRICULTURE->value)->sum('volume');
        $industrial = Consumption::where('sector', WaterSector::INDUSTRIAL->value)->sum('volume');
        $residence = Consumption::where('sector', WaterSector::RESIDENCE->value)->sum('volume');
        if (Auth::user()->role == UserRole::ADMIN->value) {
            return view('admin.dashboard', compact('consumption', 'wasted', 'agriculture', 'industrial', 'residence'));
        } else {
            return view('worker.overview', compact('consumption', 'wasted', 'agriculture', 'industrial', 'residence'));
        }
    }

    public function worker()
    {
        return view('worker.dashboard');
    }
}
