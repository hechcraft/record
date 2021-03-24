<?php

namespace App\Http\Controllers;

use App\Models\ComputerEquipment;
use App\Models\ComputerParts;
use App\Models\Types;
use Illuminate\Http\Request;
use MongoDB\BSON\Type;

class ComputerEquipmentController extends Controller
{
    public function index()
    {
        return view('equipment.index', ['equipments' => ComputerEquipment::all()]);
    }

    public function create()
    {
        return view('equipment.create', ['types' => Types::where('computer_equipment_type', '!=', 'null')->distinct()->get('computer_equipment_type'),
            'parts' => ComputerParts::all()]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:255',
            'amount' => 'required|integer',
            'description' => 'min:5',
            'type' => 'required',
        ]);

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

    public function edit(ComputerEquipment $equipment)
    {
        $parts = collect();

        foreach (json_decode($equipment->computer_parts_id) as $part){
            $parts->push(ComputerParts::find($part));
        }


        return view('equipment.edit', ['equipment' => $equipment,
            'types' => Types::where('computer_equipment_type', '!=', 'null')->distinct()->get('computer_equipment_type'),
            'parts' => $parts, 'currentType' => Types::where('computer_equipment_id', $equipment->id)->get('computer_equipment_type')]);
    }

    public function update(Request $request, ComputerEquipment $equipment)
    {
        $request->validate([
            'name' => 'required|min:3|max:255',
            'amount' => 'required|integer',
            'description' => 'min:5'
        ]);

        $type = Types::where('computer_equipment_id', $equipment->id);
        $type->update([
            'computer_equipment_id' => $equipment->id,
            'computer_equipment_type' => $request->type,
        ]);

        $equipment->update([
            'name' => $request->name,
            'user_id' => $request->user_id,
            'amount' => $request->amount,
            'description' => $request->description,
            'computer_parts_id' => json_encode($request->computer_parts_id),
        ]);
        return redirect()->route('equipments');
    }

    public function show(ComputerEquipment $equipment)
    {
        $parts = collect();

        foreach (json_decode($equipment->computer_parts_id) as $part){
            $parts->push(ComputerParts::find($part));
        }

        return view('equipment.show', ['equipment' => $equipment, 'user' => $equipment->user, 'parts' => $parts]);
    }

    public function delete(ComputerEquipment $equipment)
    {
        $equipment->delete();
        return redirect()->back();
    }
}
