<?php

namespace App\Http\Controllers;

use App\Models\ComputerEquipment;
use App\Models\ComputerParts;
use Illuminate\Http\Request;
use App\Exports\equipmentNumbers;
use Maatwebsite\Excel\Facades\Excel;

class ExportsController extends Controller
{
    public function equipmentRegistrationNumber()
    {
        return view('exports.equipmentRegistrationNumber', ['equipments' => ComputerEquipment::all()]);
    }

    public function printEquipmentRegistrationNumber(Request $request)
    {

        $equipmentCollection = collect();
        foreach ($request->all() as $id){
            $equipmentCollection->push(ComputerEquipment::find($id, ['id','name']));
        }

        $export = new equipmentNumbers($equipmentCollection);

        return Excel::download($export, 'test.xlsx');
    }

    public function partRegistrationNumber()
    {
        return view('exports.partRegistrationNumber', ['parts' => ComputerParts::all()]);
    }

    public function printPartRegistrationNumber(Request $request)
    {

        $partCollection = collect();
        foreach ($request->all() as $id){
            $partCollection->push(ComputerParts::find($id, ['id','name']));
        }

        $export = new equipmentNumbers($partCollection);

        return Excel::download($export, 'test.xlsx');
    }
}
