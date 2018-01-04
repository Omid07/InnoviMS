<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use PDF;
use App\VInvoice;
use App\Invoice;
use Knp\Snappy\Pdf;

class PdfFileExportController extends Controller
{

    /**
     * Convert venrod invoice to pdf
     */
    public function pdfForVinvoice($id)
    {
        $vinvoice = VInvoice::with('items')->findOrFail($id);

        // $pdf = PDF::loadView('pdf', compact('vinvoice'))->setOption('viewport-size','1280x1024');
        // return $pdf->download('chukku.pdf');

        $projectpath = '/var/www/html/innovims';
        $snappy = new Pdf($projectpath . '/vendor/h4cc/wkhtmltopdf-amd64/bin/wkhtmltopdf-amd64');
        $options = [
            // 'margin-top' => 55,
            // 'margin-left' => 60,
        ];
        $view = \View::make('vinvoices.pdf', compact('vinvoice'));
        $html = $view->render();
        $filename = $vinvoice->invoice_no;
        return response($snappy->getOutputFromHtml($html, $options))
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'attachment; filename="'.$filename.'.pdf"');
    }

    /**
     * Convert clinet invoice to pdf
     */
    public function pdfForInvoice($id)
    {
        $invoice = Invoice::with('products')->findOrFail($id);
        $projectpath = '/var/www/html/innovims';
        $snappy = new Pdf($projectpath . '/vendor/h4cc/wkhtmltopdf-amd64/bin/wkhtmltopdf-amd64');
        $view = \View::make('invoices.pdf', compact('invoice'));
        $html = $view->render();
        $filename = $invoice->invoice_no;
        return response($snappy->getOutputFromHtml($html))
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'attachment; filename="'.$filename.'.pdf"');
    }
}
