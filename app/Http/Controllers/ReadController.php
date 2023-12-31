<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReadApprovalRequest;
use App\Models\Book;
use App\Models\Read;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreReadRequest;
use App\Http\Requests\UpdateReadRequest;
use App\Models\ParentToChild;

class ReadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reads = Read::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->with('book')->get();

        return view('read.index', [
            'reads' => $reads,
        ]);
    }

    public function requests()
    {
        $kidIds = ParentToChild::where('user_id_parent', Auth::user()->id)->get()->pluck('user_id_child');
        $reads = Read::whereIn('user_id', $kidIds)->orderBy('created_at', 'desc')->with('book')->with('requestor')->get();

        return view('read.requests', [
            'reads' => $reads,
        ]);
    }

    public function approve(StoreReadApprovalRequest $request)
    {
        Read::where('id', $request->id)->update([
            'is_approved' => $request->is_approved,
            'user_id_approved' => Auth::user()->id,
            'approved_at' => now(),
        ]);

        return redirect('/reads/requests');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $search = Book::search('9780394800011');

        // return view('read.create', [
        //     'search' => $search,
        // ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReadRequest $request)
    {
        $book = Book::search($request->isbn);
        Read::create([
            'user_id' => Auth::user()->id,
            'isbn' => $request->isbn,
            'book_id' => $book->id,
        ]);

        return redirect('/reads');
    }

    /**
     * Display the specified resource.
     */
    public function show(Read $read)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Read $read)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReadRequest $request, Read $read)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Read $read)
    {
        //
    }
}
