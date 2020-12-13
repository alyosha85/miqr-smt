<?php

namespace App\Http\Controllers;

use App\InvAbItem;
use App\Gart;
use App\Amg;
use App\Place;
use App\Location;
use App\InvLastNumber;
use App\TempInvAbItem;
use App\InvItems;
use App\InvMoveItem;
use App\InvRoom;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Print_;



class InvAbItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('inventory.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $invnr = InvLastNumber::with('location')->with('room')->orderBy('created_at','desc')->get()->unique('location_id')->toArray();
        $garts = Gart::get()->toArray();
        $places = Place::pluck('id','pnname')->toArray();
        return ['invnr'=>$invnr,'garts'=>$garts,'places'=>$places];
    }


    /**
     * Show the form for creating a new resource (Manuell).
     */
    public function create_man()
    {
        $places = Place::pluck('id','pnname')->toArray();
        $locations = Location::with('invrooms')->get()->toArray();
        $garts = Gart::get()->toArray();
        return ['locations'=>$locations,'garts'=>$garts,'places'=>$places];
    }

    public function inventur(Request $reqeust)
    {
        $inventur = InvItems::with('invroom')->get()->toArray();
        $places = Place::pluck('id','pnname')->toArray();
        $locations = Location::with('invrooms')->get()->toArray();
        return ['locations'=>$locations,'places'=>$places,'inventur'=>$inventur];
    }


    /*************************************************************Ausmustern******************************************************************************
     * Search Method Ausmustern
     */
    public function search(Request $request)
    {
        $search_text = strtoupper($_GET['search']);
        $items = InvAbItem::with('garts')->where('invnr',$search_text)->orWhere('gname',strtoupper($search_text))->first();
        $room = InvItems::with('invroom.location')->where('invnr',$items->invnr)->first();
        $amgs = Amg::all();
        return ['items'=>$items,'room'=>$room,'amgs'=>$amgs];
    }
    /**
     * Searchcheck Method Ausmustern
     */
    public function searchCheck(Request $request)
    {
        $data = $request->all();
        $check = InvAbItem::where('invnr',$data['search'])->orwhere('gname',$data['search'])->first();
        if ($check && $data['search']!="") {
            echo "true";
        }else{
            echo "false";
        }
    }
    /**
     *  Store Method Ausmustern
     */
    public function invalid(Request $request)
    {
        $items = InvAbItem::where('invnr',$request->invnr)->with('garts')->first();
        $items->notes = $request->notes;
        $items->amg_id = $request->grund;
        $items->ausdat = date('Y-m-d');
        $items->save();

        $delItem = InvItems::where('invnr',$request->invnr)->with('invroom')->first();
        $room = $delItem->invroom->rname;
        $delItem->delete();

        $sucMsg = array(
            'message' => 'Erfolgreich bearbeitet',
            'alert-type' => 'success'
        );

        return view('inventory.print_invalid',compact('items','room'))->with($sucMsg);
    }

     /**********************************************************{{ EDIT }}******************************************************************************
     * Search Method Edit
     */
    public function search_edit(Request $request)
    {
        $search_text = strtoupper($_GET['search_edit']);
        $items = InvAbItem::with('garts')->where('invnr',$search_text)->orWhere('gname',strtoupper($search_text))->first();
        $room = InvItems::with('invroom.location')->where('invnr',$items->invnr)->first();
        return ['items'=>$items,'room'=>$room];
    }
    /**
     * Search Method Edit Search_Check
     */
    public function searchCheckEdit(Request $request)
    {
        $data = $request->all();
        $check = InvAbItem::where('invnr',$data['search_edit'])->orwhere('gname',$data['search_edit'])->first();
        if ($check && $data['search_edit']!="") {
            echo "true";
        }else{
            echo "false";
        }
    }
    /**
     * Method Edit update
     */
    public function update(Request $request)
    {
        $items = InvAbItem::where('invnr',$request->invnr)->first();
        $items->notes = $request->notes;
        $items->save();
        $sucMsg = array(
            'message' => 'Erfolgreich bearbeitet',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($sucMsg);
    }

    /**********************************************************{{ MOVE }}******************************************************************************
     * Search Method Move
     */
    public function search_move(Request $request)
    {
        $search_text = strtoupper($_GET['search_move']);
        $items = InvItems::with('invroom.location')->Where('gname',strtoupper($search_text))->first();
        $locations = Location::with('invrooms')->get()->toArray();
        $places = Place::pluck('id','pnname')->toArray();
        return ['items'=>$items,'locations'=>$locations,'places'=>$places];
    }

    public function searchCheckMove(Request $request)
    {
        $data = $request->all();
        $check = InvItems::where('gname',$data['search_move'])->first();
        if ($check && $data['search_move']!="") {
            echo "true";
        }else{
            echo "false";
        }
    }


    /**
     * Print Label Method
     */
    public function printlabel($printinvnr, $anzahl)
    {
        $explode = explode('-',$printinvnr);
        $anzahlnew = InvLastNumber::where('last_inv_num',($explode[1])-1)->first();
        $anzahlnew->last_inv_num += $anzahl;
        $anzahlnew->save();
        return view ('inventory.print',compact('explode','anzahl'));
    }


    /**
     * Show the form for creating a new resource.
     */


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

    /**
     * Item Change Method
     */
    public function itemchange()
    {
        return view('inventory.change');
    }

    /**
     * Auto Creation invnr (MAIN)
     */
    public function store(Request $request)
    {
        $item = New InvAbItem;
        $item -> invnr = $request-> invnr;
        $item -> andat = $request-> andat;
        $item -> location_id = $request-> location_id;
        $item -> kp = str_replace(',','.',$request -> kp);
        $item -> gart_id = $request-> gart_id;
        $item -> gname = $request-> gname;
        $item -> gtyp = $request-> gtyp;
        $item -> sn = $request-> sn;
        $item -> notes = $request-> notes;
        $item -> path_to_rg = $request-> path_to_rg;
        $item->save();

        $item = InvItems::Where('invnr',$request->invnr)->first();
        $item->room_id = $request->room_id;
        $item->save();

        $item = New InvLastNumber;
        $split = explode('-',$request->invnr);
        $item->location_id = $split[0];
        $item->last_inv_num = $split[1];
        $item -> save();

        $sucMsg = array(
            'message' => 'Erfolgreich hinzugefügt ',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($sucMsg);

    }
    public function movestore(Request $request)
    {

        $move = New InvMoveItem;
        $move -> gname = $request->gname_move;
        $move -> room_id = $request->room_id;
        $move->save();

        $move = InvItems::Where('gname',$request->gname_move)->first();
        $move->room_id = $request->room_id;
        $move->save();

         $sucMsg = array(
            'message' => 'Standort wurde erfolgreich geändert.',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($sucMsg);
    }

    /**
     * Manuell Creation invnr
     */
    public function storeMan(Request $request)
    {
        $item = New InvAbItem;
        $invnr = $request->location_id.'-'.$request->invnr.'-IT';
        $item -> invnr = $invnr;
        $item -> andat = $request-> andat;
        $item -> location_id = $request-> location_id;
        $item -> kp = str_replace(',','.',$request -> kp);
        $item -> gart_id = $request-> gart_id;
        $item -> gname = $request-> gname;
        $item -> gtyp = $request-> gtyp;
        $item -> sn = $request-> sn;
        $item -> notes = $request-> notes;
        $item -> path_to_rg = $request-> path_to_rg;
        $item->save();

        $invitems = InvItems::Where('invnr',$invnr)->first();
        $invitems->room_id = $request->room_id;
        $invitems->save();

        $item = New InvLastNumber;
        $item->location_id = $request->location_id;
        $item->last_inv_num = $request->invnr;
        $item -> save();

        $sucMsg = array(
            'message' => 'Erfolgreich hinzugefügt ',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($sucMsg);

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
        return view('inventory.edit');
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
