<?php

namespace App\Http\Controllers;

use App\Models\accounting_customer;
use App\Models\accounting_vendor;
use Illuminate\Http\Request;

use Carbon\Carbon;

class AccountingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if($request->has('cetak'))
        {
            $accounting_customer = accounting_customer::whereDate('to_accounting', $request->cetak)->get();
            $title_date = accounting_customer::whereDate('to_accounting', $request->cetak)->first();

            $sum_totals = accounting_customer::whereDate('to_accounting', $request->cetak)->sum('total');

            return view ('admins.accounting.cetak_customer', compact('accounting_customer', 'sum_totals', 'title_date'));
        }
        else
        {
            $accounting_customer = accounting_customer::orderBy('created_at', 'desc')
            ->get();

            return view('admins.accounting.tampilinvoice', compact('accounting_customer'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if($request->has('cetak'))
        {
            $accounting_vendor = accounting_vendor::whereDate('to_accounting', $request->cetak)->get();
            $title_date = accounting_vendor::whereDate('to_accounting', $request->cetak)->first();

            $sum_totals = accounting_vendor::whereDate('to_accounting', $request->cetak)->sum('total');

            return view ('admins.accounting.cetak_vendor', compact('accounting_vendor', 'sum_totals', 'title_date'));
        }
        else
        {
            $accounting_vendor = accounting_vendor::orderBy('created_at', 'desc')
            ->get();

            return view('admins.accounting.tampilvendorbill', compact('accounting_vendor'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $accounting_customer = accounting_customer::find($id);

        return view ('admins.accounting.cetak_customer_id', compact('accounting_customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
