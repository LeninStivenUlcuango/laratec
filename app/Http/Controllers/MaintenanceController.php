<?php

namespace App\Http\Controllers;

use App\Http\Requests\Maintenance\CreateRequest;
use App\Models\Maintenance;
use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    public function index(){
        $maintenances= Maintenance::paginate(10);
        return view('maintenances.index')->with('maintenances', $maintenances);
    }

    public function create()
    {
        return view('maintenances.create_or_edit');
    }

    public function store(CreateRequest $request){
        Maintenance::create($request->all());

        $request->session()->flash('message','Mantenimiento ingresado correctamente');
        return redirect()->route('mantenimientos.index');
    }
}
