<?php

namespace App\Exports;

use App\Siswa;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithPreCalculateFormulas;
use Maatwebsite\Excel\Events\AfterSheet;
use \Maatwebsite\Excel\Sheet;

Sheet::macro('styleCells', function (Sheet $sheet, string $cellRange, array $style) {
    $sheet->getDelegate()->getStyle($cellRange)->applyFromArray($style);
});

class SiswaExport implements WithHeadings, ShouldAutoSize, WithEvents, FromQuery, WithMapping, WithPreCalculateFormulas
{
    /**
     * @return \Illuminate\Support\Collection
     */

    public function __construct(int $nis)
    {
        $this->nis = $nis;

        return $this;
    }

    public function query()
    {
        return Siswa::join('tbl_sekolahasal', 'tbl_sekolahasal.nis_siswa', '=', 'tbl_siswa.nis_lokal')->where('nis_lokal', $this->nis);
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getDelegate()->mergeCells('A1:J2');
                $event->sheet->getDelegate()->mergeCells('A3:N3');
                $event->sheet->getDelegate()->mergeCells('O3:X3');
                $event->sheet->getParent()->getDefaultStyle()->applyFromArray([
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                    ],
                ]);
                $hi = $event->sheet->getHighestColumn();
                $lastColumn = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($hi);
                for ($col = 'A'; $col <= $hi; $col++) {
                    $event->sheet->getDelegate()->mergeCells($col . '4:' . $col . '5');
                }
                $event->sheet->styleCells(
                    'A3:' . $event->sheet->getHighestColumn() . $event->sheet->getHighestRow(),
                    [
                        'borders' => [
                            'allBorders' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                'color' => ['argb' => '262626'],
                            ],
                        ],
                    ]
                );
                $event->sheet->getStyle('H6')->getNumberFormat()->setFormatCode('0000');
                $event->sheet->styleCells(
                    'A3:X4',
                    [
                        'fill' => [
                            'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                            'color' => ['argb' => 'FFF701'],
                        ],
                    ]
                );
            },
        ];
    }

    public function map($siswa): array
    {
        return [
            [],
            [
                '',
                $siswa->nis_lokal,
                $siswa->nisn,
                $siswa->no_induk,
                $siswa->nama_siswa,
                $siswa->tempat_lahir . ', ' . $siswa->tgl_lahir,
                $siswa->jk,
                html_entity_decode($siswa->phone_ortuwali),
                $siswa->cita_cita,
                $siswa->hobi,
                $siswa->status_siswa,
                $siswa->jarak_rumahsekolah,
                $siswa->kendaraan,
                $siswa->agama,
                $siswa->sekolah_asal,
                $siswa->jenis_sekolah,
                $siswa->status_sekolah,
                $siswa->kabupaten_sekolahasal,
                $siswa->no_ujiansebelumnya,
                $siswa->npsn_sekolahasal,
                $siswa->blanko_skhunasal,
                $siswa->nilai_un .
                $siswa->tgl_kelulusan,
            ],
        ];
    }

    public function headings(): array
    {
        return [
            ['Data Siswa SMK / SMA ALMARWAH'],
            [],
            ['Data Probadi Siswa', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Asal Sekolah Sebelumnya'],
            ['', 'NIS Lokal', 'NISN', 'Nomor Induk', 'Nama Siswa', 'TTL', 'Jenis Kelamin', 'Phone', 'Cita-Cita', 'Hobi', 'Status Siswa', 'Jarak Rumah ke Sekolah', 'Transportasi', 'Agama',
                'Nama Sekolah', 'Jenis Sekolah', 'Status Sekolah', 'Kabupaten / Kota', 'Nomor Peserta Ujian', 'NPSN Sekolah', 'No Blanko SKHU Sebelumnya', 'No Ijazah Asal', 'Nilai UN', 'Tanggal Kelulusan',
            ],
        ];
    }
}
