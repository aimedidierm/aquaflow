<?php

namespace App\Http\Controllers;

use App\Http\Requests\WaterRecordRequest;
use App\Models\Consumption;
use Illuminate\Http\Request;

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
}
