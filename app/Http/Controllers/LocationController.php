<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Division;
use App\Models\Thana;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function getAllLocation(Request $request)
    {

        $districts = Division::with('districts.thanas')->get();
        return $districts;


    }
}
