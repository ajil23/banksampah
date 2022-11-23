<?php
namespace App\Exports;
use App\Models\Transaksi;
use DateTime;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\AfterSheet;

class KeluaranExport implements
    WithMapping,
    WithHeadings,
    ShouldAutoSize,
    WithEvents,
    FromQuery,
    WithTitle
{
    use Exportable;
    private $year;
    private $month;
    public function __construct(int $year, int $month)
    {
        $this->year = $year;
        $this->month = $month;
    }
    public function query()
    {
        return Transaksi::query()->with('nasabah.penduduk')
            ->whereYear('created_at', $this->year)
            ->whereMonth('created_at', $this->month);
    }
    public function map($pegawai): array
    {
        return [
            $pegawai->nasabah->penduduk->namaLengkap,
            $pegawai->keterangan_pembelian,
            $pegawai->nominal,
            $pegawai->created_at
        ];
    }
    public function headings(): array
    {
        return [
            'Nama Transaksi',
            'Keterangan Pembelian',
            'Nominal',
            'Tanggal Pembelian'
        ];
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getStyle('A1:D1')->applyFromArray([
                    'font' => [
                        'bold' => true
                    ]
                ]);
            }
        ];
    }
    public function title(): string
    {
        return DateTime::createFromFormat('!m', $this->month)->format('F');
    }
}
