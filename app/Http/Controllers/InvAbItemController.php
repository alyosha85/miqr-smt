<?php

namespace App\Http\Controllers;

use App\InvAbItem;
use App\Location;
use App\InvLastNumber;
use App\TempInvAbItem;
use App\InvItems;
use App\InvRoom;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Print_;

class InvAbItemController extends Controller
{
    public function printlabel($printinvnr, $anzahl)
    {
        $explode = explode('-',$printinvnr);
        $anzahlnew = InvLastNumber::where('last_inv_num',($explode[1])-1)->first();
        $anzahlnew->last_inv_num += $anzahl;
        $anzahlnew->save();
        return view ('inventory.print',compact('explode','anzahl'));
    }

    public function search(Request $request)
    {
        $search_text = strtoupper($_GET['search']);
        $items = InvAbItem::with('location')->where('invnr',$search_text)->orWhere('gname',strtoupper($search_text))->first();
        $room = InvItems::with('invroom')->where('invnr',$items->invnr)->first();

        return view('inventory.index',compact('items','room'));
    }

    public function searchCheck(Request $request)
    {
        $data = $request->all();
        //echo "<pre>"; print_r($data['search']);
        $check = InvAbItem::where('invnr',$data['search'])->orwhere('gname',$data['search'])->first();
        if ($check && $data['search']!="") {
            echo "true";
        }else{
            echo "false";
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('inventory.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
        $invnr = InvLastNumber::with('location')->with('room')->orderBy('created_at','desc')->get()->unique('location_id')->toArray();

        return $invnr;

    }

    public function upload_pdf(Request $request)
    {

    $pdf = $request->file('file');

     $pdfName = time() . '.' . $pdf->extension();
     $pdf->move(public_path('/inventar/rechnungen/'.date('Y')), $pdfName);
     return date('Y').'/'.$pdfName;

    }

    function fetch_pdf()
    {
     $pdfs = \File::allFiles(public_path('/inventar/rechnungen/'.date('Y')));
     $output = '<div class="row">';
     foreach($pdfs as $pdf)
     {
      $output .= '<div class="col-md-2">
                <img src="'.asset('inventar/rechnungen/pdfIcon.png').'" class="img-thumbnail" width="150" height="150"/>
                <button type="button" class="btn btn-link remove_pdf" id="'.$pdf->getFilename().'">Remove</button>
            </div>';
     }
     $output .= '</div>';
     echo $output;
    }

    function delete_pdf(Request $request)
    {
     if($request->get('name'))
     {
      \File::delete(public_path('/inventar/rechnungen/'.date('Y').'/' . $request->get('name')));
     }
    }

    public function create_man()

    {
        $locations = Location::with('invrooms')->get()->toArray();
        return $locations;
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = New InvAbItem;
        $item -> invnr = $request-> invnr;
        $item -> andat = $request-> andat;
        $item -> location_id = $request-> location_id;
        $item -> kp = str_replace(',','.',$request -> kp);
        $item -> gart = $request-> gart;
        $item -> gname = $request-> gname;
        $item -> gtyp = $request-> gtyp;
        $item -> sn = $request-> sn;
        $item -> notes = $request-> notes;
        $item -> path_to_rg = $request-> path_to_rg;
        $item->save();

        $item = InvItems::Where('invnr',$request->invnr)->first();
        $item->room_id = $request->rname;
        $item->save();

        $item = New InvLastNumber;
        $split = explode('-',$request->invnr);
        $item->location_id = $split[0];
        $item->last_inv_num = $split[1];
        $item -> save();

        return redirect()->back()->with("item_added",'Added successfully !!!!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Inv_ab_item  $inv_ab_item
     * @return \Illuminate\Http\Response
     */
    public function show(Invabitem $invabitem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Inv_ab_item  $inv_ab_item
     * @return \Illuminate\Http\Response
     */
    public function edit(Invabitem $invabitem)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Inv_ab_item  $inv_ab_item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invabitem $invabitem)
    {
        $items = InvAbItem::findorfail($request->id);
        $items->notes = $request->notes;
        $items->update();
        $notification = array(
            'message' => 'Erfolgreich aktualisiert',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Inv_ab_item  $inv_ab_item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invabitem $inv_ab_item)
    {
        //
    }
}
