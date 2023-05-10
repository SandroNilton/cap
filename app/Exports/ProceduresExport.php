<?php

namespace App\Exports;

use App\Models\Procedure;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProceduresExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Procedure::all();
    }
}
