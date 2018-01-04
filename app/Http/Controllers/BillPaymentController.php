<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BillPayment;

class BillPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $billpayments = BillPayment::orderBy('created_at', 'desc')
            ->paginate(20);
        return view('billpayments.index', compact('billpayments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('billpayments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $record = BillPayment::create($request->all());
        return redirect()->action('BillPaymentController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $billpayment = BillPayment::find($id);
        return view('billpayments.show', compact('billpayment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $billpayment = BillPayment::find($id);
        return view('billpayments.edit', compact('billpayment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $billpayment = BillPayment::find($id);
        $input = $request->all();
        $billpayment->update($input);
        return view('billpayments.show', compact('billpayment'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $billpayment = BillPayment::find($id);
        $billpayment->delete();
        return redirect()->action('BillPaymentController@index');
    }
}
