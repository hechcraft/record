<?php

namespace App\Http\Controllers;

use App\Models\ComputerParts;
use App\Models\Types;
use Illuminate\Http\Request;

class ComputerPartsController extends Controller
{
    public function index()
    {
        return view('parts.index');
    }

    public function create()
    {
        return view('parts.create', ['types' => Types::where('computer_parts_type', '!=', 'null')->distinct()->get('computer_parts_type')]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'min:3|required',
            'amount' => 'required|integer',
            'description' => 'min:5',
        ]);

        ComputerParts::create([
            'name' => $request->name,
            'user_id' => $request->user_id,
            'amount' => $request->amount,
            'description' => $request->description,
        ]);

        $lastParts = ComputerParts::orderByDesc('id')->first();

        Types::create([
            'computer_parts_id' => $lastParts->id,
            'computer_parts_type' => $request->type,
        ]);

        return redirect()->route('parts');
    }
}
