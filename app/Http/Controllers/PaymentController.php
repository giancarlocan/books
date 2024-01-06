<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Report;
use App\Models\Payment;
use App\Models\ParentToChild;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use App\Models\Read;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->is_parent) {

            $kidIds = ParentToChild::where('user_id_parent', Auth::user()->id)->get()->pluck('user_id_child');
            $kids = User::whereIn('id', $kidIds)->get();

            $payouts = Payment::with('kid')->orderBy('user_id_kid')->get();
            $earnings = Read::with('kid')->orderBy('user_id')->get();

            // select user_id_kid, sum(payout) as 'total_payouts'
            // from payments
            // where
            // user_id_kid in (3,4)
            // group by user_id_kid

            // select user_id, sum(payment) as 'total_payments'
            // from `reads`
            // where
            // user_id in (3,4)
            // group by user_id


            // $payouts = Payment::whereIn('user_id_kid', $kidIds)->groupBy('user_id_kid')->get();
            // $payments = Report::whereIn('user_id', $kidIds)->where('is_approved', true)->with('read')->get();

            return view('payment.kids', [
                'payouts' => $payouts,
                'earnings' => $earnings,
            ]);
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
