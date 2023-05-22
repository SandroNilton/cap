<?php

namespace App\Exports;

use App\Models\Typeprocedure;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TypeproceduresExport implements FromQuery, /*FromCollection,*/ WithHeadings, WithMapping, ShouldAutoSize, WithColumnFormatting
{
    public $typeprocedures;

    public function __construct($typeprocedures) {
        $this->typeprocedures = $typeprocedures;
    }

    public function headings(): array
    {
        return [
            '#',
            'Nombre',
            'Descripcion',
            'Área',
            'Categoría',
            'Precio',
            'Estado',
            'Fecha de creación'
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function map($invoice): array
    {
        return [
            $invoice->id,
            $invoice->name,
            $invoice->description,
            $invoice->area->name,
            $invoice->category->name,
            $invoice->price,
            $invoice->state,
            $invoice->created_at,
        ];
    }

    public function columnFormats(): array
    {
        return [
            'G' => NumberFormat::FORMAT_DATE_DATETIME,
        ];
    }


    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        return Typeprocedure::whereIn('id', $this->typeprocedures);
    }
}
