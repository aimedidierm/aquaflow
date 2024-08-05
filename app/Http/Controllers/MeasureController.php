<?php

namespace App\Http\Controllers;

use App\Models\Measure;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class MeasureController extends Controller
{
    public function report()
    {
        $measures = Measure::get();
        // return view('admin.report', compact('measures'));
        $pdf = Pdf::loadView('admin.report', compact('measures'));
        return $pdf->download('report.pdf');
    }
}
