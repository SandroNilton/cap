<?php

namespace App\Exports;

use App\Models\Area;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AreasExport implements FromQuery, /*FromCollection,*/ WithHeadings, WithMapping, ShouldAutoSize, WithColumnFormatting
{
    public $areas;

    public function __construct($areas) {
        $this->areas = $areas;
    }

    public function headings(): array
    {
        return [
            '#',
            'Nombre',
            'Descripción',
            'Límite de dias',
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
            $invoice->limit_day,
            $invoice->state,
            $invoice->created_at,
            //\PhpOffice\PhpSpreadsheet\Shared\Date::dateTimeToExcel($invoice->created_at),
        ];
    }

    public function columnFormats(): array
    {
        return [
            'F' => NumberFormat::FORMAT_DATE_DATETIME,
        ];
    }

    /* public function collection()
    {
        return Area::whereIn('id', $this->areas)->get();
    }*/

    public function query()
    {
        return Area::whereIn('id', $this->areas);
    }
}

