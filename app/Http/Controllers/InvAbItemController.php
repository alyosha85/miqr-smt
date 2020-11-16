<?php

namespace App\Http\Controllers;

use App\InvAbItem;
use Illuminate\Http\Request;

class InvAbItemController extends Controller
{



    public function search(Request $request)
    {
        $search_text = strtoupper($_GET['search']);
        $items = InvAbItem::where('invnr',$search_text)->orWhere('gname',strtoupper($search_text))->first();
        //return $items->kp;
        return view('admin/admin_dashboard',compact('items'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Inv_ab_item  $inv_ab_item
     * @return \Illuminate\Http\Response
     */
    public function show(Inv_ab_item $inv_ab_item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Inv_ab_item  $inv_ab_item
     * @return \Illuminate\Http\Response
     */
    public function edit(Inv_ab_item $inv_ab_item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Inv_ab_item  $inv_ab_item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inv_ab_item $inv_ab_item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Inv_ab_item  $inv_ab_item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inv_ab_item $inv_ab_item)
    {
        //
    }
}
