<?php

namespace App\Http\Controllers\Admin;

use App\Models\Iuran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pengeluaran;

class LaporanController extends Controller
{
    public function index(){
        return view('admin.laporan');
    }


    public function iuran_pdf(){
        $mpdf = new \Mpdf\Mpdf();

        $iuran = Iuran::all();

        $mpdf->WriteHTML(view('exports-pdf.iuran-detail', ['iuran' => $iuran]));

        $mpdf->Output();
    }

    public function pengeluaran_pdf(){
        $mpdf = new \Mpdf\Mpdf();

        $pengeluaran = Pengeluaran::all();

        $mpdf->WriteHTML(view('exports-pdf.pengeluaran', ['pengeluaran' => $pengeluaran]));

        $mpdf->Output();
    }
}
