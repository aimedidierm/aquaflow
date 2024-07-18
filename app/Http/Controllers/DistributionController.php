<?php

namespace App\Http\Controllers;

use App\Http\Requests\WaterRecordRequest;
use App\Models\Distribution;
use Illuminate\Http\Request;

class DistributionController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(WaterRecordRequest $request)
    {
        Distribution::create([
            "volume" => $request->input('volume'),
            "sector" => $request->input('sector'),
        ]);

        return redirect('/worker');
    }
}
