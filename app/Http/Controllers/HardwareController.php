<?php

namespace App\Http\Controllers;

use App\Http\Requests\HardwareRequest;
use App\Models\Measure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HardwareController extends Controller
{
    public function show(HardwareRequest $request)
    {
        $mesure = Measure::create(
            [
                'value' => $request->input('tds'),
                'user_id' => 1,
            ]
        );

        return response()->json([
            'message' => 'Measure stored',
            'value' => $mesure->value,
        ], Response::HTTP_OK);
    }
}
