<?php

namespace App\Http\Controllers;

use App\User;
use App\Place;
use App\Ticket;
use App\Problem;
use App\InvItems;
use App\Location;
use Carbon\Carbon;
use App\TicketType;
use App\EquipmentProblem;
use App\InvRoom;
use Illuminate\Http\Request;

class TicketController extends Controller
{

  public function __construct()
  {
    $this->middleware('permission:ticket_submit|my_tickets', ['only' => ['submit']]);
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $users = User::get()->toArray();
      $now = Carbon::now()->locale('de_DE')->translatedFormat('d F Y H:i');
      $user = Auth()->user();
      $tickets = TicketType::all();
      return view('tickets.index',compact('user','now','tickets','users'));

    }
    //! Ticket computer //
    public function computer_all()
    {
      $users = User::get()->toArray();
      $now = Carbon::now()->locale('de_DE')->translatedFormat('d F Y H:i');
      $user = Auth()->user();
      $tickets = TicketType::all(); 
      return view('tickets.computer.all',compact('user','now','tickets','users'));
    }
    public function softwareRequest() 
    {
      $users = User::get()->toArray();
      $computers = InvItems::where('gart_id','2')->orwhere('gart_id','3')->get();
      $now = Carbon::now()->locale('de_DE')->translatedFormat('d F Y H:i');
      $user = Auth()->user();
      $tickets = TicketType::all();
      return view ('tickets.computer.softwareRequest',compact('user','now','tickets','users','computers'));
    }
    public function hardwareRequest() 
    {
      $users = User::get()->toArray();
      $computers = InvItems::where('gart_id','2')->orwhere('gart_id','3')->get();
      $now = Carbon::now()->locale('de_DE')->translatedFormat('d F Y H:i');
      $user = Auth()->user();
      $tickets = TicketType::all();
      return view ('tickets.computer.hardwareRequest',compact('user','now','tickets','users','computers'));
    }
    public function pc_problems() 
    {
      $users = User::get()->toArray();
      $computers = InvItems::where('gart_id','2')->orwhere('gart_id','3')->get();
      $now = Carbon::now()->locale('de_DE')->translatedFormat('d F Y H:i');
      $user = Auth()->user();
      $tickets = TicketType::all();
      return view ('tickets.computer.pc_problems',compact('user','now','tickets','users','computers'));
    }
    public function printer_in_out() 
    {
      $rooms = InvRoom::with('location')->get();
      $users = User::get()->toArray();
      $computers = InvItems::where('gart_id','2')->orwhere('gart_id','3')->get();
      $now = Carbon::now()->locale('de_DE')->translatedFormat('d F Y H:i');
      $user = Auth()->user();
      $tickets = TicketType::all();
      return view ('tickets.computer.printer_in_out',compact('user','now','tickets','users','computers'));
    }
    public function other() 
    {
      $rooms = InvRoom::with('location')->get();
      $users = User::get()->toArray();
      $computers = InvItems::where('gart_id','2')->orwhere('gart_id','3')->get();
      $now = Carbon::now()->locale('de_DE')->translatedFormat('d F Y H:i');
      $user = Auth()->user();
      $tickets = TicketType::all();
      return view ('tickets.computer.other',compact('user','now','tickets','users','computers'));
    }
    //! Ticket printer //
    public function printer_all()
    {
      $users = User::get()->toArray();
      $now = Carbon::now()->locale('de_DE')->translatedFormat('d F Y H:i');
      $user = Auth()->user();
      $tickets = TicketType::all(); 
      return view('tickets.printer.all',compact('user','now','tickets','users'));
    }

    public function printer_driver() 
    {
      $rooms = InvRoom::with('location')->get();
      $users = User::get()->toArray();
      $computers = InvItems::where('gart_id','2')->orwhere('gart_id','3')->get();
      $now = Carbon::now()->locale('de_DE')->translatedFormat('d F Y H:i');
      $user = Auth()->user();
      $tickets = TicketType::all();
      return view ('tickets.printer.driver',compact('user','now','tickets','users','computers'));
    }
    public function scanner() 
    {
      $rooms = InvRoom::with('location')->get();
      $users = User::get()->toArray();
      $computers = InvItems::where('gart_id','2')->orwhere('gart_id','3')->get();
      $now = Carbon::now()->locale('de_DE')->translatedFormat('d F Y H:i');
      $user = Auth()->user();
      $tickets = TicketType::all();
      return view ('tickets.printer.scanner',compact('user','now','tickets','users','computers'));
    }
    public function function() 
    {
      $rooms = InvRoom::with('location')->get();
      $users = User::get()->toArray();
      $computers = InvItems::where('gart_id','2')->orwhere('gart_id','3')->get();
      $now = Carbon::now()->locale('de_DE')->translatedFormat('d F Y H:i');
      $user = Auth()->user();
      $tickets = TicketType::all();
      return view ('tickets.printer.function',compact('user','now','tickets','users','computers'));
    }
    public function errors() 
    {
      $rooms = InvRoom::with('location')->get();
      $users = User::get()->toArray();
      $computers = InvItems::where('gart_id','2')->orwhere('gart_id','3')->get();
      $now = Carbon::now()->locale('de_DE')->translatedFormat('d F Y H:i');
      $user = Auth()->user();
      $tickets = TicketType::all();
      return view ('tickets.printer.errors',compact('user','now','tickets','users','computers'));
    }
    //! Ticket telephone //
    public function telephone_all()
    {
      $users = User::get()->toArray();
      $now = Carbon::now()->locale('de_DE')->translatedFormat('d F Y H:i');
      $user = Auth()->user();
      $tickets = TicketType::all(); 
      return view('tickets.telephone.all',compact('user','now','tickets','users'));
    }
    public function tel_problems() 
    {
      $rooms = InvRoom::with('location')->get();
      $users = User::get()->toArray();
      $now = Carbon::now()->locale('de_DE')->translatedFormat('d F Y H:i');
      $user = Auth()->user();
      $tickets = TicketType::all();
      return view ('tickets.telephone.tel_problems',compact('user','now','tickets','users'));
    }

    public function tel_in_room(Request $request)
    {
			$telephones = InvItems::where('room_id',$request->telephones)->where('gart_id','15')->get();
      return $telephones;
    }



    public function usertickets()
    {
      return view('tickets.usertickets');
    }

    public function problem_type(Request $request)
    {
      $ticket_id = $request->ticket_id;
      $problems = Problem::where('ticket_type_id',$ticket_id)->get();
      return response()->json(['problems'=>$problems]);
    }

    public function problem_type_machine(Request $request)
    {
      $whatever = $request->problem_type_id;
      $problems = EquipmentProblem::where('problem_id',$whatever)->get();
      return response()->json(['problems'=>$problems]);
    }


    public function dependant_forms(Request $request)
    {
      $problem_id = $request->form_id;
      $contactname = $request->searchbyname;
      $forms = Problem::where('ticket_type_id',$problem_id)->get();
      $searchByName = User::where('name',$contactname)->get();
      if (!empty($searchByName )) {
        return response()->json(['problem_id'=>$problem_id,'searchByName'=>$searchByName]);
      };
      return response()->json(['problem_id'=>$problem_id]);
    }

    public function address()
    {
        $places = Place::pluck('id','pnname')->toArray();
        $locations = Location::with('invrooms')->get()->toArray();
        return ['locations'=>$locations,'places'=>$places];
    }

    public function printer_in_room(Request $request)
    {
			$printers = InvItems::where('room_id',$request->printers)->where('gart_id','5')->get();
      return $printers;
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
        return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}
