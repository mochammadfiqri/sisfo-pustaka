<?php

namespace App\Exports;

use App\Models\Book;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Border;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;

class BooksExport implements FromQuery, WithMapping, WithHeadings, WithEvents, WithColumnWidths, ShouldAutoSize
{
    use Exportable;

    protected $books;

    public function __construct($books)
    {
        $this->books = $books;
    }

    public function columnWidths(): array
    {
        return [
            'O' => 35,
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                // Set the default font size to 12 and font type to Times New Roman
                $event->sheet->getStyle('A1:Q1')->getFont()->setSize(12);
                $event->sheet->getStyle('A1:Q1')->getFont()->setName('Times New Roman');

                $event->sheet->getStyle('A1:Q1')->applyFromArray([
                    'font'  => ['bold' => true],
                    'fill' => [
                            'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                            'startColor' => ['argb' => 'FFFFFF00'], // Set font color to yellow
                        ],
                    'borders' => [ // Add borders to the headings
                            'allBorders' => [
                                'borderStyle' => Border::BORDER_THIN,
                                'color' => ['argb' => '000000'], // Border color (black)
                            ],
                        ],
                ]);

                // Set custom height for the heading row (row 1)
                $event->sheet->getRowDimension(1)->setRowHeight(25); // Set the height to 30 units (adjust as needed)

                // Apply text wrapping for the "Abstrak" column (column P)
                $abstrakColumn = 'O';
                $lastRow = $event->sheet->getHighestRow();
                $abstrakRange = 'O2:' . $abstrakColumn . $lastRow;

                $event->sheet->getStyle($abstrakRange)->getAlignment()->setWrapText(true);

                $statusColumn = 'Q';
                // Set middle alignment for all cells (columns A to Q)
                $event->sheet->getStyle('A1:' . $statusColumn . $lastRow)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);

                // Center the table horizontally (columns A to Q)
                $event->sheet->getStyle('A1:' . $statusColumn . $lastRow)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
            },
        ];
    }

    public function headings(): array
    {
        return [
            'Kode Buku',
            'Judul',
            'Kategori',
            'Jilid',
            'Cetakan',
            'Edisi',
            'Kata Kunci',
            'Bahasa',
            'ISBN / ISSN',
            'Halaman',
            'Tahun Terbit',
            'Kota Terbit',
            'Penerbit',
            'Pengarang',
            'Abstrak',
            'Website',
            'Status',
        ];
    }

    public function query()
    {
        return Book::query()->whereIn('id', $this->books->pluck('id'));
    }

    public function map($books): array {
        // Ambil array dari relasi categories untuk buku saat ini
        $categories = $books->categories->pluck('name')->implode(', ');

        return [
            $books->kode_buku,
            $books->judul,
            $categories,
            $books->jilid,
            $books->cetakan,
            $books->edisi,
            $books->kata_kunci,
            $books->bahasa,
            $books->isbn_issn,
            $books->halaman,
            $books->tahun_terbit,
            $books->kota_terbit,
            $books->penerbit,
            $books->pengarang,
            $books->abstrak,
            $books->url,
            $books->status,
        ];
    }
}
