<?php

namespace App\Exports;

use App\Models\Role;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RolesExport implements FromQuery, /*FromCollection,*/ WithHeadings, WithMapping, ShouldAutoSize, WithColumnFormatting
{
    public $roles;

    public function __construct($roles) {
        $this->roles = $roles;
    }

    public function headings(): array
    {
        return [
            '#',
            'Nombre',
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
            $invoice->created_at,
            //\PhpOffice\PhpSpreadsheet\Shared\Date::dateTimeToExcel($invoice->created_at),
        ];
    }

    public function columnFormats(): array
    {
        return [
            'C' => NumberFormat::FORMAT_DATE_DATETIME,
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        return Role::whereIn('id', $this->roles);
    }
}
