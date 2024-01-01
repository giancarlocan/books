<?php

namespace App\Http\Controllers;

use App\Models\Read;
use App\Models\Report;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreReportRequest;
use App\Http\Requests\UpdateReportRequest;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($readId)
    {
        $read = Read::where('id', $readId)->with('book')->first();

        return view('report.create', [
            'read' => $read,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReportRequest $request)
    {
        Report::create([
            'user_id' => Auth::user()->id,
            'read_id' => $request->read_id,
            'book_id' => $request->book_id,
            'rating' => $request->rating,
            'description' => $request->description,
        ]);
        return redirect('/dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(Report $report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReportRequest $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Report $report)
    {
        //
    }
}