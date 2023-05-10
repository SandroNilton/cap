<?php

namespace App\Exports;

use App\Models\Typeprocedure;
use Maatwebsite\Excel\Concerns\FromCollection;

class TypeproceduresExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Typeprocedure::all();
    }
}
