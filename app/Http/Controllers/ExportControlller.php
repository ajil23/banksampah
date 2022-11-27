<?php

namespace App\Http\Controllers;

use App\Exports\MultipleExport;
use App\Exports\MultipleKeluaranExport;
use App\Exports\PemasukanExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportControlller extends Controller
{
    public function export()
    {
        $petugas = Excel::download(new MultipleExport(2022), 'Pemasukan Nasabah.xlsx');
        ob_end_clean();
        return $petugas;
    }
    public function exportKeluaran()
    {
        $data = Excel::download(new MultipleKeluaranExport(2022), 'Penarikan Nasabah.xlsx');
        ob_end_clean();
        return $data;
    }
}
