<?php

namespace App\Http\Controllers;

use App\User;
use App\Place;
use App\Ticket;
use App\InvRoom;
use App\Problem;
use App\InvItems;
use App\Location;
use Carbon\Carbon;
use App\TicketType;
use App\EquipmentProblem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

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
        $user = Auth()->user();
        $admins = User::role('Super_Admin')->get();
        return $admins;
        $item = New Ticket;
        $item -> submitter = $request -> submitter;
        $item -> priority = $request -> priority;
        $item -> tel_number = $request -> tel_number;
        $item -> custom_tel_number = $request -> custom_tel_number;
        $item -> problem_type = $request -> problem_type;
        $item -> gname_id = $request -> searchcomputer;
        $item -> searchsoftware = $request-> searchsoftware;
        $item -> software_name = $request-> software_name;
        $item -> software_reason = $request-> software_reason;
        $item -> notizen = $request-> notizen;
        $item -> keyboard = $request-> keyboard;
        $item -> mouse = $request-> mouse;
        $item -> speaker = $request-> speaker;
        $item -> headset = $request-> headset;
        $item -> webcam = $request-> webcam;
        $item -> monitor = $request-> monitor;
        $item -> other = $request-> other;
        $item -> geht_nicht_an = $request-> geht_nicht_an;
        $item -> blue = $request-> blue;
        $item -> black = $request-> black;
        $item -> slow_computer = $request-> slow_computer;
        $item -> web_cam_problem = $request-> web_cam_problem;
        $item -> head_set_problem = $request-> head_set_problem;
        $item -> lautsprecher_mal = $request-> lautsprecher_mal;
        $item -> keyboard_malfunction = $request-> keyboard_malfunction;
        $item -> mouse_mal = $request-> mouse_mal;
        $item -> slow_network = $request-> slow_network;
        $item -> no_network_drive = $request-> no_network_drive;
        $item -> laud_fan = $request-> laud_fan;
        $item -> location_id = $request -> location_id;
        $item -> room_id = $request -> room_id;
        $item -> printer_name = $request -> printer_name;
        $item ->save();
        Notification::send();
        return redirect()->route('ticket.usertickets');
    }
     
    public function usertickets()
    {

      $user = Auth()->user();
      $myTickets = Ticket::where('submitter',$user->username)->orderBy('updated_at','DESC')->get();
      $myTicketsCount = Ticket::where('submitter',$user->username)->count();
      return view('tickets.usertickets',compact('user','myTickets','myTicketsCount'));
    }

    public function show(Ticket $ticket)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {

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
