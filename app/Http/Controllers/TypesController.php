<?php

namespace App\Http\Controllers;

use App\Models\Types;
use Illuminate\Http\Request;
use MongoDB\BSON\Type;
use function PHPUnit\Framework\isNull;

class TypesController extends Controller
{
    public function index()
    {
        $computer_parts_type = Types::where('computer_parts_type', '!=', null)->distinct()->get('computer_parts_type');
        $computer_equipment_type = Types::where('computer_equipment_type', '!=', null)->distinct()->get('computer_equipment_type');
        return view('types.index', ['computerPartsType' => $computer_parts_type, 'computerEquipmentType' => $computer_equipment_type]);
    }

    public function create()
    {
        return view('types.create');
    }

    public function equipmentCreate()
    {
        return view('types.equipmentCreate');
    }

    public function partCreate()
    {
        return view('types.partCreate');
    }

    public function store(Request $request)
    {
        $request->validate([
            'typeName' => 'required'
        ]);

        if ($request->isPart){
            Types::create([
               'computer_parts_type' => $request->typeName,
            ]);

            return redirect()->route('types');
        }

        if ($request->isEquipment){
            Types::create([
               'computer_equipment_type' => $request->typeName,
            ]);

            return redirect()->route('types');
        }
    }
}
