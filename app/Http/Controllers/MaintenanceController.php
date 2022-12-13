<?php

namespace App\Http\Controllers;

use App\Models\Maintenance;
use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    public function index(){
        $maintenances= Maintenance::paginate(10);
        return view('maintenances.index')->with('maintenances', $maintenances);
    }
}
