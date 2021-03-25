<?php

namespace App\Http\Controllers;

use App\Models\ComputerParts;
use App\Models\Types;
use App\Models\User;
use Illuminate\Http\Request;

class ComputerPartsController extends Controller
{
    public function index()
    {
        return view('parts.index', ['parts' => ComputerParts::all()]);
    }

    public function create()
    {
        return view('parts.create', ['users' => User::all(),'types' => Types::where('computer_parts_type', '!=', 'null')->distinct()->get('computer_parts_type')]);
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'min:3|required',
            'amount' => 'required|integer',
            'description' => 'min:5',
            'type' => 'required',
            'user_id' => 'required',
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

    public function edit(ComputerParts $part)
    {
        $currentType = Types::where('computer_parts_id', $part->id)->get('computer_parts_type');

        return view('parts.edit', ['part' => $part, 'currentType' => $currentType, 'users' => User::all(),
            'types' => Types::where('computer_parts_type', '!=', 'null')->distinct()->get('computer_parts_type')]);
    }

    public function update(Request $request, ComputerParts $part)
    {
        $request->validate([
            'name' => 'min:3|required',
            'amount' => 'required|integer',
            'description' => 'min:5',
            'type' => 'required',
            'user_id' => 'required',
        ]);

        $type = Types::where('computer_parts_id', $part->id);
        $type->update([
            'computer_parts_id' => $part->id,
            'computer_parts_type' => $request->type,
        ]);

        $part->update([
            'name' => $request->name,
            'user_id' => $request->user_id,
            'amount' => $request->amount,
            'description' => $request->description,
        ]);

        return redirect()->route('parts');
    }

    public function show(ComputerParts $part)
    {
        return view('parts.show', ['part' => $part, 'user' => $part->user]);
    }

    public function delete(ComputerParts $part)
    {
        $part->delete();
        return redirect()->back();
    }
}
