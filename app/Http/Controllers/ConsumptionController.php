<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use App\Http\Requests\WaterRecordRequest;
use App\Models\Consumption;
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
        if (UserRole::ADMIN->value == Auth::user()->role) {
            return view('admin.analytics');
        } else {
            # code...
        }
    }
}
