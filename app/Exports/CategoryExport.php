<?php

namespace App\Exports;

use App\Models\Category;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithEvents;
use PhpOffice\PhpSpreadsheet\Style\Border;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class CategoryExport implements FromQuery, WithMapping, WithHeadings, WithColumnWidths, WithEvents
{
    use Exportable;

    public function registerEvents(): array {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                // Set the default font size to 12 and font type to Times New Roman
                $event->sheet->getStyle('A1')->getFont()->setSize(12);
                $event->sheet->getStyle('A1')->getFont()->setName('Times New Roman');

                $event->sheet->getStyle('A1')->applyFromArray([
                    'font'  => ['bold' => true],
                    'fill' => [
                            'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                            'startColor' => ['argb' => 'FFFFFF00'], // Set font color to yellow
                        ],
                ]);

                $event->sheet->getDelegate()->getStyle('A' . ($event->sheet->getHighestRow()))
                    ->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);

                $statusColumn = 'A';
                $lastRow = $event->sheet->getHighestRow();

                // Set middle alignment for all cells (columns A to A)
                $event->sheet->getStyle('A1:' . $statusColumn . $lastRow)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);

                // Center the table horizontally (columns A to A)
                $event->sheet->getStyle('A1:' . $statusColumn . $lastRow)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
            }
        ];
    }
    
    public function query() {
        return Category::select('name');
    }

    public function map($category): array
    {
        return [
            $category->name,
        ];
    }

    public function headings(): array {
        return [
            'Name',
        ];
    }
    
    public function columnWidths(): array
    {
        return [
            'A' => 20, // Set width for column A (Name column)
        ];
    }
}
