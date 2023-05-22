<?php

namespace App\Exports;

use App\Models\User;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CustomersExport implements FromQuery, /*FromCollection,*/ WithHeadings, WithMapping, ShouldAutoSize, WithColumnFormatting
{
    public $customers;

    public function __construct($customers) {
        $this->customers = $customers;
    }

    public function headings(): array
    {
        return [
            '#',
            'Tipo',
            'Codigo',
            'Nombre',
            'Correo',
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
            $invoice->type,
            $invoice->code,
            $invoice->name,
            $invoice->email,
            $invoice->state,
            $invoice->created_at,
            //\PhpOffice\PhpSpreadsheet\Shared\Date::dateTimeToExcel($invoice->created_at),
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
        return User::whereIn('id', $this->customers);
    }
}
