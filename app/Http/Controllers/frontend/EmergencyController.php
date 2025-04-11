<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Emergency;
use App\Models\Service;
use Illuminate\Http\Request;

class EmergencyController extends Controller
{
    public function index()
    {
        $emergency = Emergency::first();
        $services = Service::limit(10)->get();

        return view('frontend.emergency.index', compact(
            'emergency',
             'services'));
    }

}
