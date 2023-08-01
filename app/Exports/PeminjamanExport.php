<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\RentLogs;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithEvents;
use PhpOffice\PhpSpreadsheet\Style\Border;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PeminjamanExport implements FromQuery, WithMapping, WithHeadings, WithEvents, ShouldAutoSize
{
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                // Set the default font size to 12 and font type to Times New Roman
                $event->sheet->getStyle('A1:C1')->getFont()->setSize(12);
                $event->sheet->getStyle('A1:C1')->getFont()->setName('Times New Roman');

                $event->sheet->getStyle('A1:C1')->applyFromArray([
                    'font'  => ['bold' => true],
                    'fill' => [
                            'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                            'startColor' => ['argb' => 'FFFFFF00'], // Set font color to yellow
                        ],
                ]);

                $event->sheet->getDelegate()->getStyle('A1:C' . ($event->sheet->getHighestRow()))
                    ->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);

                // Set custom height for the heading row (row 1)
                $event->sheet->getRowDimension(1)->setRowHeight(25); // Set the height to 30 units (adjust as needed)

                // Apply text wrapping for the "Abstrak" column (column P)
                
                $lastRow = $event->sheet->getHighestRow();
                $statusColumn = 'Q';
                // Set middle alignment for all cells (columns A to Q)
                $event->sheet->getStyle('A1:' . $statusColumn . $lastRow)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);

                // Center the table horizontally (columns A to Q)
                $event->sheet->getStyle('A1:' . $statusColumn . $lastRow)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
            },
        ];
    }

    public function query() {
        return Rentlogs::select('user_id', 'book_id', 'rent_date');
    }

    public function headings(): array {
        return [
            'User',
            'Judul',
            'Tgl. Peminjaman'
        ];
    }

    public function map($RentLogs): array {
        return [
            $RentLogs->User->username,
            $RentLogs->Book->judul,
            Carbon::parse($RentLogs->rent_date)->formatLocalized('%d %B %Y')
        ];
    }
}