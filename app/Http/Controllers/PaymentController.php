<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use App\Models\Report;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->is_parent) {
        } else {
            $payouts = Payment::where('user_id_kid', Auth::user()->id)->orderBy('created_at', 'desc')->get();
            $payments = Report::where('user_id', Auth::user()->id)->where('is_approved', true)->with('read')->get();
            $payoutTotal = Payment::where('user_id_kid', Auth::user()->id)->orderBy('created_at', 'desc')->get()->sum('payout');
            $paymentTotal = Report::where('user_id', Auth::user()->id)->where('is_approved', true)->with('read')->get()->sum('read.payment');

            return view('payment.index', [
                'payouts' => $payouts,
                'payments' => $payments,
                'paymentTotal' => $paymentTotal,
                'payoutTotal' => $payoutTotal,
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePaymentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePaymentRequest $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
