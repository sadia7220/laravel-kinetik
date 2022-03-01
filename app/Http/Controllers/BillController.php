<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use Illuminate\Http\Request;
use App\Models\Customer;
use Carbon\Carbon;


use App\Mail\BillGeneratedEmail;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer_bill=Bill::all();
        return $this->getResponse(200, 'Customer Bill List', $customer_bill);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'bill_month' => 'required|string|max:255',
            'year' => 'required|string|max:255',
            'amount' => 'required|string|max:255',
            'customer_id' => 'required|max:11',
        ]);

        $customer_bill = Bill::create([
            'bill_month' => $validatedData['bill_month'],
            'year' => $validatedData['year'],
            'amount' => $validatedData['amount'],
            'customer_id' => $validatedData['customer_id'],
        ]);

        return $this->getResponse(201, 'Bill created Successfully!', $customer_bill);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function show(Bill $bill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function edit(Bill $bill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bill $bill)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bill $bill)
    {
        //
    }

    public function changeBillStatus(Request $request)
    {
        $bill = Bill::where('id', '=', $request->id)->first();

        if(is_null($bill)){
            return $this->getResponse(404, 'Bill not found!');
        }

        $bill->status = 1;
        $bill->save();

        return $this->getResponse(200, 'Billing status has been changed from due to paid!', $bill);
    }

    public function generateReport(Request $request)
    {
        $customer = Customer::where('id', '=', $request->id)->first();

        if(is_null($customer)){
            return $this->getResponse(404, 'customer not found!');
        }

        // Need data from the last 30 days.
        $query = Bill::where('customer_id', $customer->id)->where('created_at', '>=', Carbon::today()->subDays(30));

        $data = [
            'total_bill' => number_format($query->sum('amount'), 2),
        ];


        event(new BillGeneratedEmail('sadia_test@gmail.com'));
        //event(new BillGeneratedEmail($customer->email));

        return $this->getResponse(200, 'Bill 2 report has been generated!', $data);
    }
}
