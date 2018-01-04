<?php

namespace App\Http\Controllers;

use App\VInvoice;
use Illuminate\Http\Request;
use App\InvoiceProduct;
use App\Invoice;
use App\VendorProduct;
use DB;
use PDF;



class VInvoiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $id = null;
        $vinvoices = VInvoice::orderBy('created_at', 'desc')
            ->paginate(8);
        return view('vinvoices.index', compact('vinvoices','id'));
    }

    /**
     * Display a listing of vendor bills againts a client bill.
     *
     * @return \Illuminate\Http\Response
     */
    public function listofbills($id)
    {   
        $invoice_number = "VB".$id;
        $vinvoices = VInvoice::where('invoice_no', $invoice_number)->orderBy('created_at', 'desc')->paginate(8);
        return view('vinvoices.index', compact('vinvoices', 'id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $number = VInvoice::max('id');
        $number = sprintf('%03d', ($number+1));
        $invoice_number = "VB".date('y').date('m').$number;
        return view('vinvoices.create', compact('invoice_number'));
    }

    /**
     * Show the form for creating a new resource againts invoice number.
     *
     * @return \Illuminate\Http\Response
     */
    public function createfor($invoice_number)
    {
        $invoice_number = "VB".$invoice_number;
        return view('vinvoices.create', compact('invoice_number'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'invoice_no' => 'required|alpha_dash',
            'client' => 'required|max:255',
            'client_address' => 'required|max:255',
            'invoice_date' => 'required|date_format:Y-m-d',
            'due_date' => 'required|date_format:Y-m-d',
            'title' => 'required|max:255',
            'advance' => 'required|numeric|min:0',
            'discount' => 'required|numeric|min:0',
            'items.*.name' => 'required|max:255',
            'items.*.price' => 'required|numeric|min:1',
            'items.*.qty' => 'required|integer|min:1'
        ]);
        $items = collect($request->items)->transform(function($item) {
            $item['total'] = $item['qty'] * $item['price'];
            return new VendorProduct($item);
            // return;
        });
        if($items->isEmpty()) {
            return response()
            ->json([
                'items_empty' => ['One or more Product is required.']
            ], 422);
        }

        $data = $request->except('items');
        $data['sub_total'] = $items->sum('total');
        $data['grand_total'] = $data['sub_total'] - $data['discount'] - $data['advance'];
        $vinvoice = VInvoice::create($data);
        $vinvoice->items()->saveMany($items);
        return response()
            ->json([
                'created' => true,
                'id' => $vinvoice->id
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\VInvoice  $vInvoice
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $invoice_id = $id;
        $vinvoice = VInvoice::with('items')->findOrFail($id);
        return view('vinvoices.show', compact('vinvoice'));
        // echo "vendor invoice show";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\VInvoice  $vInvoice
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vinvoice = VInvoice::with('items')->findOrFail($id);
        return view('vinvoices.edit', compact('vinvoice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\VInvoice  $vInvoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'invoice_no' => 'required|alpha_dash|unique:invoices,invoice_no,'.$id.',id',
            'client' => 'required|max:255',
            'client_address' => 'required|max:255',
            'invoice_date' => 'required|date_format:Y-m-d',
            'due_date' => 'required|date_format:Y-m-d',
            'title' => 'required|max:255',
            'advance' => 'required|numeric|min:0',
            'discount' => 'required|numeric|min:0',
            'items.*.name' => 'required|max:255',
            'items.*.price' => 'required|numeric|min:1',
            'items.*.qty' => 'required|integer|min:1'
        ]);
        $vinvoice = VInvoice::findOrFail($id);
        $items = collect($request->items)->transform(function($item) {
            $item['total'] = $item['qty'] * $item['price'];
            return new VendorProduct($item);
        });
        if($items->isEmpty()) {
            return response()
            ->json([
                'items_empty' => ['One or more Product is required.']
            ], 422);
        }
        $data = $request->except('items');
        $data['sub_total'] = $items->sum('total');
        // $data['grand_total'] = $data['sub_total'] - $data['discount'];
        $data['grand_total'] = $data['sub_total'] - $data['discount'] - $data['advance'];
        $vinvoice->update($data);
        VendorProduct::where('v_invoice_id', $vinvoice->id)->delete();
        $vinvoice->items()->saveMany($items);
        return response()
            ->json([
                'updated' => true,
                'id' => $vinvoice->id
            ]);    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\VInvoice  $vInvoice
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vinvoice = VInvoice::findOrFail($id);
        VendorProduct::where('v_invoice_id', $vinvoice->id)
            ->delete();
        $vinvoice->delete();
        return redirect()
            ->route('vinvoices.index');
    }
}
