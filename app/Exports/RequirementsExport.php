<?php

namespace App\Exports;

use App\Models\Requirement;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RequirementsExport implements FromQuery, /*FromCollection,*/ WithHeadings, WithMapping, ShouldAutoSize, WithColumnFormatting
{
    public $requirements;

    public function __construct($requirements) {
      $this->requirements = $requirements;
    }

    public function headings(): array
    {
        return [
            '#',
            'Nombre',
            'Descripción',
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
            $invoice->state,
            $invoice->created_at,
        ];
    }

    public function columnFormats(): array
    {
        return [
            'F' => NumberFormat::FORMAT_DATE_DATETIME,
        ];
    }

    public function query()
    {
        return Requirement::whereIn('id', $this->requirements);
    }
}
