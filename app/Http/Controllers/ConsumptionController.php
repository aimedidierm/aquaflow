<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use App\Enums\WaterSector;
use App\Http\Requests\WaterRecordRequest;
use App\Models\Consumption;
use App\Models\Distribution;
use App\Models\Measure;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConsumptionController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(WaterRecordRequest $request)
    {
        Consumption::create([
            "volume" => $request->input('volume'),
            "sector" => $request->input('sector'),
        ]);

        return redirect('/worker');
    }

    public function waterAnalytics()
    {
        $consumption = Consumption::sum('volume');
        $wasted = Distribution::sum('volume') - Consumption::sum('volume');
        $agriculture = Consumption::where('sector', WaterSector::AGRICULTURE->value)->sum('volume');
        $industrial = Consumption::where('sector', WaterSector::INDUSTRIAL->value)->sum('volume');
        $residence = Consumption::where('sector', WaterSector::RESIDENCE->value)->sum('volume');
        if (UserRole::ADMIN->value == Auth::user()->role) {
            return view('admin.analytics', compact('consumption', 'wasted', 'agriculture', 'industrial', 'residence'));
        } else {
            return view('worker.analytics', compact('consumption', 'wasted', 'agriculture', 'industrial', 'residence'));
        }
    }

    public function waterPredictions()
    {
        // $currentDate = Carbon::now();
        // $startOfWeek = $currentDate->startOfWeek(); // Start of the current week (Monday)
        // $endOfWeek = $currentDate->endOfWeek();     // End of the current week (Sunday)

        // $consumption = Consumption::whereBetween('created_at', [$startOfWeek, $endOfWeek])
        //     ->sum('volume');
        $consumption = Consumption::sum('volume');
        if (Auth::user()->role == UserRole::ADMIN->value) {
            return view('admin.prediction', compact('consumption'));
        } else {
            # code...
        }
    }

    public function waterManagement()
    {
        $limit = 3000;
        // $currentDate = Carbon::now();
        // $startOfWeek = $currentDate->startOfWeek(); // Start of the current week (Monday)
        // $endOfWeek = $currentDate->endOfWeek();     // End of the current week (Sunday)
        // $startOfMonth = $currentDate->startOfMonth(); // Start of the current week (Monday)
        // $endOfMonth = $currentDate->endOfMonth();     // End of the current week (Sunday)

        // $consumptionWeekly = Consumption::whereBetween('created_at', [$startOfWeek, $endOfWeek])
        //     ->sum('volume');
        $consumptionWeekly = Consumption::sum('volume');
        $prediction = $consumptionWeekly + $consumptionWeekly / 6;
        // $consumptionMonthly = Consumption::whereBetween('created_at', [$startOfMonth, $endOfMonth])
        //     ->sum('volume');
        $consumptionMonthly = Consumption::sum('volume');
        $agriculture = Consumption::where('sector', WaterSector::AGRICULTURE->value)->sum('volume');
        $industrial = Consumption::where('sector', WaterSector::INDUSTRIAL->value)->sum('volume');
        $residence = Consumption::where('sector', WaterSector::RESIDENCE->value)->sum('volume');
        $tds = Measure::latest()->first();

        if (Auth::user()->role == UserRole::ADMIN->value) {
            return view('admin.water-management', compact(
                'consumptionMonthly',
                'limit',
                'prediction',
                'agriculture',
                'industrial',
                'residence',
                'consumptionWeekly',
                'consumptionMonthly',
                'tds'
            ));
        } else {
            # code...
        }
    }

    public function waterQuality()
    {
        $agriculture = Consumption::where('sector', WaterSector::AGRICULTURE->value)->sum('volume');
        $industrial = Consumption::where('sector', WaterSector::INDUSTRIAL->value)->sum('volume');
        $residence = Consumption::where('sector', WaterSector::RESIDENCE->value)->sum('volume');
        $tds = Measure::latest()->first();
        if (Auth::user()->role == UserRole::ADMIN->value) {
            return view('admin.water-quality', compact('tds', 'agriculture', 'industrial', 'residence'));
        } else {
            return view('worker.water-quality', compact('tds', 'agriculture', 'industrial', 'residence'));
        }
    }

    public function waterMonitoring()
    {

        // $currentDate = Carbon::now();
        // $startOfWeek = $currentDate->startOfWeek(); // Start of the current week (Monday)
        // $endOfWeek = $currentDate->endOfWeek();     // End of the current week (Sunday)
        // $consumptionWeekly = Consumption::whereBetween('created_at', [$startOfWeek, $endOfWeek])
        //     ->sum('volume');
        $consumptionWeekly = Consumption::sum('volume');
        $agriculture = Consumption::where('sector', WaterSector::AGRICULTURE->value)->sum('volume');
        $industrial = Consumption::where('sector', WaterSector::INDUSTRIAL->value)->sum('volume');
        $residence = Consumption::where('sector', WaterSector::RESIDENCE->value)->sum('volume');
        $consumption = Consumption::sum('volume');
        if (Auth::user()->role == UserRole::ADMIN->value) {
            return view('admin.monitoring', compact(
                'agriculture',
                'industrial',
                'residence',
                'consumptionWeekly',
                'consumption'
            ));
        } else {
            # code...
        }
    }
}
