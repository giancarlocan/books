<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ParentToChild;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreParentToChildRequest;
use App\Http\Requests\UpdateParentToChildRequest;

class ParentToChildController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $relationships = ParentToChild::where('user_id_parent', Auth::user()->id)->get();
        $children = User::whereIn('id', $relationships->pluck('user_id_child'))->get();

        return view('children.index', [
            'children' => $children,
        ]);
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
    public function store(StoreParentToChildRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ParentToChild $parentToChild)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ParentToChild $parentToChild)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateParentToChildRequest $request, ParentToChild $parentToChild)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ParentToChild $parentToChild)
    {
        //
    }
}
