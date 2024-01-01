<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReportApprovalRequest;
use App\Models\Read;
use App\Models\Report;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreReportRequest;
use App\Http\Requests\UpdateReportRequest;
use App\Models\ParentToChild;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->is_parent) {
            $kidIds = ParentToChild::where('user_id_parent', Auth::user()->id)->get()->pluck('user_id_child');
            $reports = Report::whereIn('user_id', $kidIds)->with('book')->with('author')->orderBy('created_at', 'desc')->get();
        } else {
            $reports = Report::where('user_id', Auth::user()->id)->with('book')->orderBy('created_at', 'desc')->get();
        }
        return view('report.index', [
            'reports' => $reports,
        ]);
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
        return redirect('/reports');
    }

    /**
     * Display the specified resource.
     */
    public function show($reportId)
    {
        $report = Report::where('id', $reportId)->with('book')->with('author')->first();

        return view('report.show', [
            'report' => $report,
        ]);
    }

    public function approve(StoreReportApprovalRequest $request)
    {
        Report::where('id', $request->report_id)->update([
            'is_approved' => $request->is_approved,
            'user_id_approved' => Auth::user()->id,
            'approved_at' => now(),
        ]);
        return redirect('/reports');
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
