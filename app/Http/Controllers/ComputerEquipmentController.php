<?php

namespace App\Http\Controllers;

use App\Models\ComputerEquipment;
use App\Models\ComputerParts;
use App\Models\Types;
use Illuminate\Http\Request;

class ComputerEquipmentController extends Controller
{
    public function index()
    {
        return view('equipment.index', ['equipments' => ComputerEquipment::all()]);
    }

    public function create()
    {
        return view('equipment.create', ['types' => Types::where('computer_equipment_type', '!=', 'null')->get(),
                                                'parts' => ComputerParts::all()]);
    }

    public function store(Request $request)
    {
        $parts = $request->computer_parts_id;
        array_pop($parts);

        dd($parts);
        ComputerEquipment::create([
            'name' => $request->name,
            'user_id' => $request->user_id,
            'amount' => $request->amount,
            'description' => $request->description,
            'computer_parts_id' => json_encode($request->computer_parts_id),
        ]);

        $lastEquipment = ComputerEquipment::orderByDesc('id')->first();

        Types::create([
           'computer_equipment_id' => $lastEquipment->id,
            'computer_equipment_type' => $request->type,
        ]);

        return redirect()->route('equipments');
    }
}
