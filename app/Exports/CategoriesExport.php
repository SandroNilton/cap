<?php

namespace App\Exports;

use App\Models\Category;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CategoriesExport implements FromQuery, /*FromCollection,*/ WithHeadings, WithMapping, ShouldAutoSize, WithColumnFormatting
{
    public $categories;

    public function __construct($categories) {
        $this->categories = $categories;
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
            'E' => NumberFormat::FORMAT_DATE_DATETIME,
        ];
    }

    public function query()
    {
        return Category::whereIn('id', $this->categories);
    }
}
