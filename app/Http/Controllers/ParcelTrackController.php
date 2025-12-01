<?php

namespace App\Http\Controllers;

use App\Models\Parcel;
use Illuminate\Http\Request;

class ParcelTrackController extends Controller
{
    public function index()
{
    return view('track.index');
}

public function search(Request $request)
{
    $request->validate([
        'tracking_number' => 'required'
    ]);

    $parcel = Parcel::where('tracking_number', $request->tracking_number)->first();

    if (!$parcel) {
        return back()->with('error', 'Tracking number tidak dijumpai');
    }

    return view('track.result', compact('parcel'));
}

}
