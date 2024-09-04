<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class PdfController extends Controller
{
    //
public function exportPdf() {
      $pdf = PDF::loadView('index'); // <--- load your view into theDOM wrapper;
      $path = public_path('pdf/'); // <--- folder to store the pdf documents into the server;
      $fileName =  time().'.'. 'pdf' ; // <--giving the random filename,
      $pdf->save($path . '/' . $fileName);
      $generated_pdf_link = url('pdf/'.$fileName);
      return response()->json($generated_pdf_link);
  }
}
