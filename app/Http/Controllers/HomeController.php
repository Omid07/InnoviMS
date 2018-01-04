<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invoice;
use App\VInvoice;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = Invoice::where('work_status', 'initial')->orderBy('created_at')->paginate(8);
        $dueinvoice = Invoice::where([
            ['bill_status', 'unpaid'],
            ['work_status', 'finished'],
            ])->orderBy('created_at')->paginate(8);
        $tobepaid = VInvoice::where([
            ['bill_status', 'unpaid'],
            ['work_status', 'finished'],
            ])->orderBy('created_at')->paginate(8);
        return view('home', compact('invoices', 'dueinvoice', 'tobepaid'));
    }
}
