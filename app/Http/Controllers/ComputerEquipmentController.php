<?php

namespace App\Http\Controllers;

use App\Models\ComputerEquipment;
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
        return view('equipment.create');
    }

    public function store(Request $request)
    {
        ComputerEquipment::create([
            'name' => $request->name,
            'user_id' => $request->user_id,
            'amount' => $request->amount,
            'description' => $request->description,
            'computer_parts_id' => json_encode($request->computer_parts_id),
        ]);
    }
}
