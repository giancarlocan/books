<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReadRequest;
use App\Http\Requests\UpdateReadRequest;
use App\Models\Book;
use App\Models\Read;

class ReadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('read.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $search = Book::search('9780394800011');

        return view('read.create', [
            'search' => $search,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReadRequest $request)
    {
        //
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
