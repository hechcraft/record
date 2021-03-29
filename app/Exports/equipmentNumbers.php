<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

class equipmentNumbers implements FromCollection
{
    protected $data;

    public function headings(): array
    {
        return [
            'Number',
            'Name',
        ];
    }

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function collection()
    {
        return $this->data;
    }
}
