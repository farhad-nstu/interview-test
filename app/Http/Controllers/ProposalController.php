<?php

namespace App\Http\Controllers;

use App\Proposal;
use Illuminate\Http\Request;

class ProposalController extends Controller
{
    public function index()
    {
        return Proposal::orderBy('created_at', 'desc')->get();
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $proposal = new Proposal;
        $proposal->number = $request->number;
        $proposal->discount = $request->discount;
        $proposal->customer_id = $request->customer_id;
        $proposal->category_id = $request->category_id;

        $proposal->save();
        return $proposal;
    }

    public function show(Proposal $proposal)
    {
        return response()->json($proposal);
    }

    public function edit(Proposal $proposal)
    {
        //
    }

    public function update(Request $request, Proposal $proposal)
    {
        //
    }

    public function destroy(Proposal $proposal)
    {
        $proposal->delete();
    }
}
