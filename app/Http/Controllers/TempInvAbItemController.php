<?php

namespace App\Http\Controllers;

use App\TempInvAbItem;
use App\InvAbItem;
use Illuminate\Http\Request;

class TempInvAbItemController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reads = TempInvAbItem::get()->toArray();
        if ($reads) {
            foreach ($reads as $read) {
                $member = InvAbItem::where('invnr',$read['invnr'])->orWhere('gname',strtoupper($read['gname']))->first();
                if ($member) {
                    \Log::channel('doublelog')->error($member);
                } else {
                InvAbItem::create([
                    'invnr' => $read['invnr'],
                    'locid' => $read['locid'],
                    'gname' => strtoupper($read['gname']),
                    'gart' => $read['gart'],
                    'andat' => date('Y-m-d') // current date
                ]);
                }
            }
            \Log::channel('doublelog')->error('====================================================================================================================================================================================================');
            return 'Success !';
        }
        return 'No Data Found';
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
     * @param  \App\Temp_inv_ab_item  $temp_inv_ab_item
     * @return \Illuminate\Http\Response
     */
    public function show(Temp_inv_ab_item $temp_inv_ab_item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Temp_inv_ab_item  $temp_inv_ab_item
     * @return \Illuminate\Http\Response
     */
    public function edit(Temp_inv_ab_item $temp_inv_ab_item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Temp_inv_ab_item  $temp_inv_ab_item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Temp_inv_ab_item $temp_inv_ab_item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Temp_inv_ab_item  $temp_inv_ab_item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Temp_inv_ab_item $temp_inv_ab_item)
    {
        //
    }
}
