<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parcel;
use App\Models\ParcelCheckpoint;

class TrackController extends Controller
{
    public function index()
    {
        return view('track.show');
    }

    public function search(Request $request)
    {
        $parcel = Parcel::where('tracking_number', $request->tracking_number)->first();

        if (!$parcel) {
            return view('track.show', ['notfound' => true]);
        }

        // Jika anda ada table movement seperti parcel_checkpoints
        $checkpoints = ParcelCheckpoint::where('parcel_id', $parcel->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('track.show', compact('parcel', 'checkpoints'));
    }
}
