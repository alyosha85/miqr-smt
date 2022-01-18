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
use App\TicketStatus;
use App\InvAbItem;
use App\EquipmentProblem;
use App\Gart;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Notifications\TicketNotification;
use App\TicketPriority;
use Illuminate\Support\Facades\Notification;
use Illuminate\Notifications\DatabaseNotification;

class TicketController extends Controller
{

  function __construct()
  {
    $this->middleware('permission:Ticket_Erstellen|Meine_Tickets|Ticket_IT', ['only' => [
      'index',
      'computer_all',
      'softwareRequest',
      'peripheralRequest',
      'pc_problems',
      'printer_in_out',
      'other',
      'printer_all',
      'printer_driver',
      'scanner',
      'functuality',
      'errors',
      'telephone_all',
      'tel_problems',
      'tel_in_room',
      'problem_type',
      'problem_type_machine',
      'dependant_forms',
      'address',
      'printer_in_room',
      'store',
      'usertickets',
      'show'
      ]]);


    $this->middleware('permission:Ticket_IT', ['only' => [
      'opentickets',
      'unassignedtickets',
      'assignedTo',
      ]]);
 

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
    public function peripheralRequest() 
    {
      $users = User::get()->toArray();
      $computers = InvItems::where('gart_id','2')->orwhere('gart_id','3')->get();
      $now = Carbon::now()->locale('de_DE')->translatedFormat('d F Y H:i');
      $user = Auth()->user();
      $tickets = TicketType::all();
      return view ('tickets.computer.peripheralRequest',compact('user','now','tickets','users','computers'));
    }
    public function hardwareRequest() 
    {
      $users = User::get()->toArray();
      $machines = Gart::where('id','2')->orwhere('id','3')->orwhere('id','4')->orwhere('id','5')
      ->orwhere('id','13')->orwhere('id','15')->orwhere('id','18')->orwhere('id','17')->orwhere('id','6')->get();
      $now = Carbon::now()->locale('de_DE')->translatedFormat('d F Y H:i');
      $user = Auth()->user();
      $tickets = TicketType::all();
      return view ('tickets.computer.hardwareRequest',compact('user','now','tickets','users','machines'));
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

     //! Ticket users //
     public function users_all()
     {
       $users = User::get()->toArray();
       $now = Carbon::now()->locale('de_DE')->translatedFormat('d F Y H:i');
       $user = Auth()->user();
       return view('tickets.users.all',compact('user','now','users'));
     }

     public function employee() 
     {
       $users = User::get()->toArray();
       $now = Carbon::now()->locale('de_DE')->translatedFormat('d F Y H:i');
       $user = Auth()->user();
       return view ('tickets.users.employee',compact('user','now','users'));
     }

     public function participant() 
     {
       $users = User::get()->toArray();
       $now = Carbon::now()->locale('de_DE')->translatedFormat('d F Y H:i');
       $user = Auth()->user();
       return view ('tickets.users.participant',compact('user','now','users'));
     }
     public function users_others() 
     {
       $users = User::get()->toArray();
       $now = Carbon::now()->locale('de_DE')->translatedFormat('d F Y H:i');
       $user = Auth()->user();
       return view ('tickets.users.usersOthers',compact('user','now','users'));
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
    public function functuality() 
    {
      $rooms = InvRoom::with('location')->get();
      $users = User::get()->toArray();
      $computers = InvItems::where('gart_id','2')->orwhere('gart_id','3')->get();
      $now = Carbon::now()->locale('de_DE')->translatedFormat('d F Y H:i');
      $user = Auth()->user();
      $tickets = TicketType::all();
      return view ('tickets.printer.functuality',compact('user','now','tickets','users','computers'));
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
    public function tel_changes() 
    {
      $rooms = InvRoom::with('location')->get();
      $users = User::get()->toArray();
      $now = Carbon::now()->locale('de_DE')->translatedFormat('d F Y H:i');
      $user = Auth()->user();
      $tickets = TicketType::all();
      return view ('tickets.telephone.tel_changes',compact('user','now','tickets','users'));
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        $admins = User::role('Super_Admin')->get();
        $ticket = New Ticket;
        $ticket -> submitter = $request -> submitter;
        $ticket -> priority_id = $request -> priority;
        $ticket -> tel_number = $request -> tel_number;
        $ticket -> custom_tel_number = $request -> custom_tel_number;
        $ticket -> problem_type = $request -> problem_type;
        $ticket -> gname_id = $request -> searchcomputer;   //* searchcomputer -> gname_id //
        $ticket -> searchsoftware = $request -> searchsoftware;
        $ticket -> software_name = $request -> software_name;
        $ticket -> software_reason = $request -> software_reason;
        $ticket -> pc_laptop_others = $request -> pclaptopsonstiges; //*pc_laptop_others -> pclaptopsonsitges // 
        $ticket -> keyboard = $request -> keyboard;
        $ticket -> mouse = $request -> mouse;
        $ticket -> speaker = $request -> speaker;
        $ticket -> headset = $request -> headset;
        $ticket -> webcam = $request -> webcam;
        $ticket -> monitor = $request -> monitor;
        $ticket -> other = $request -> other;
        $ticket -> geht_nicht_an = $request -> geht_nicht_an;
        $ticket -> blue = $request -> blue;
        $ticket -> black = $request -> black;
        $ticket -> slow_computer = $request -> slow_computer;
        $ticket -> web_cam_problem = $request -> web_cam_problem;
        $ticket -> head_set_problem = $request -> head_set_problem;
        $ticket -> lautsprecher_mal = $request -> lautsprecher_mal;
        $ticket -> keyboard_malfunction = $request -> keyboard_malfunction;
        $ticket -> mouse_mal = $request -> mouse_mal;
        $ticket -> slow_network = $request -> slow_network;
        $ticket -> no_network_drive = $request -> no_network_drive;
        $ticket -> laud_fan = $request -> laud_fan;
        $ticket -> scanner_wrong_folder = $request -> scanner_wrong_folder;
        $ticket -> scanner_not_working = $request -> scanner_not_working;
        $ticket -> scanner_myname_list = $request -> scanner_myname_list;
        $ticket -> location_id = $request -> location_id;
        $ticket -> room_id = $request -> room_id;
        $ticket -> printer_name = $request -> printer_name;
        $ticket -> gart_id = $request -> searchmachine;
        $ticket -> replication_id = $request -> replication_id;
        $ticket -> position_employee = $request -> position_employee;
        $ticket -> abteilung_employee = $request -> abteilung_employee;
        $ticket -> telephone_employee = $request -> telephone_employee;
        $ticket -> outlook = $request -> outlook;
        $ticket -> isplus = $request -> isplus ;
        $ticket -> employee_lastname = $request -> employee_lastname ;
        $ticket -> employee_firstname = $request -> employee_firstname ;
        $ticket -> password_name = $request -> password_name ;
        $ticket -> forgotten = $request -> forgotten ;
        $ticket -> inaktiv = $request -> inaktiv ;
        $ticket -> expiring_date = $request -> expiring_date;
        $ticket -> abgelaufen = $request -> abgelaufen;
        $ticket -> user_oldname = $request -> user_oldname;
        $ticket -> user_newname = $request -> user_newname;
        $ticket -> user_other_username = $request -> user_other_username;
        $ticket -> tel_target_place = $request -> tel_target_place;
        $ticket -> tel_target_room = $request -> tel_target_room;
        $ticket -> current_tel_name = $request -> current_tel_name;
        $ticket -> new_tel_name = $request -> new_tel_name;
        $ticket -> new_tel_number = $request -> new_tel_number;
        $description = $request->notizen;
        
        if ($description) {
          $dom = new \DomDocument();
          $dom->loadHtml(utf8_decode($description), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);   
          $images = $dom->getElementsByTagName('img');
            foreach($images as $k => $img){
              $data = $img->getAttribute('src');
              list($type, $data) = explode(';', $data);
              list($type, $data) = explode(',', $data);
              $data = base64_decode($data);
              $image_name= "/upload/" . time().$k.'.png';
              $path = public_path() . $image_name;
              file_put_contents($path, $data);
              $img->removeAttribute('src');
              $img->setAttribute('src', $image_name);
            }
          $description = $dom->saveHTML();
          $ticket->notizen = $description;
        }


        $ticket->save();

        $notifications = [
          'ticket_id' => $ticket->id,
          'submitter' => $ticket->subUser->username,
          'problem_type' => $ticket->problem_type,
        ];
        Notification::send($admins, new TicketNotification($notifications));
        return redirect()->route('ticket.usertickets');
    }


    public function store_participant(Request $request){
      foreach ($request->addmore as $key => $value) {
        $admins = User::role('Super_Admin')->get();
        $ticket = New Ticket;
        $ticket -> submitter = $request -> submitter;
        $ticket -> priority_id = $request -> priority;
        $ticket -> tel_number = $request -> tel_number;
        $ticket -> custom_tel_number = $request -> custom_tel_number;
        $ticket -> problem_type = $request -> problem_type;
        $ticket->name_participant = $request->name_participant;
        $ticket->vorname_participant = $request->vorname_participant;
        $ticket->course_participant = $request->course_participant;
        $ticket->notes_participant = $request->notes_participant;
      }
      return $request;
      $ticket->save();

      Notification::send($admins, new TicketNotification($ticket));
      return redirect()->route('ticket.usertickets');
    }
     
    public function usertickets()
    {
      $user = Auth()->user();
      $myTickets = Ticket::with('invitem.invroom.location.place')->with('printer.invroom.location.place')->where('submitter',$user->id)->orWhere('assignedTo',$user->id)->orderBy('updated_at','DESC')->get();
      $myTicketsCount = Ticket::where('submitter',$user->id)->orWhere('assignedTo',$user->id)->count();
      return view('tickets.usertickets',compact('user','myTickets','myTicketsCount'));
    }

    public function opentickets()
    {
      $user = Auth()->user();
      $admins = User::role('Super_Admin')->get();
      $myTickets = Ticket::with('subUser')->orderBy('created_at','DESC')->get();
      $AllTicketsCount = Ticket::all()->count();
      $UnassignedTicketsCount = Ticket::whereNull('assignedTo')->count();
      $myTicketsCount = Ticket::where('submitter',$user->id)->orWhere('assignedTo',$user->id)->count();
      return view('tickets.admins.open',compact('user','myTickets','AllTicketsCount','admins','UnassignedTicketsCount','myTicketsCount'));
    }

    public function unassignedtickets()
    {
      $name = 'unassigned';
      $user = Auth()->user();
      $admins = User::role('Super_Admin')->get();
      $myTickets = Ticket::whereNull('assignedTo')->orderBy('updated_at','DESC')->get();
      $UnassignedTicketsCount = Ticket::whereNull('assignedTo')->count();
      $AllTicketsCount = Ticket::all()->count();
      $myTicketsCount = Ticket::where('submitter',$user->id)->orWhere('assignedTo',$user->id)->count();
      return view('tickets.admins.unassigned',compact('user','myTickets','UnassignedTicketsCount','admins','myTicketsCount','AllTicketsCount'));
    }

    public function show($id)
    {
      $ticket_status = TicketStatus::all();
      $ticket_priority = TicketPriority::all();
      $ticket = Ticket::with('invitem.invroom.location.place')->with('printer.invroom.location.place')->with('subUser')->where('id',$id)->first();

      $userUnreadNotification = auth()->user()->unreadNotifications
                                ->whereIn('data->id',$id)
                                ->first();
                                return $userUnreadNotification;
      //                           if($userUnreadNotification) {
      //                             $userUnreadNotification->markAsRead();
      //                         }


      $createdAt = Carbon::parse($ticket->created_at);
      $telNewRoom = InvRoom::where('id',$ticket->tel_target_room)->first();
      $telNewAddress = Location::where('id',$ticket->tel_target_place)->first();
      return view('tickets.admins.showticket',compact('ticket','createdAt','ticket_status','ticket_priority','telNewRoom','telNewAddress'));
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
    public function assignedTo(Request $request)
    {
      $assigned = Ticket::where('id',$request->ticket_id)->first();
      $assigned -> assignedTo = $request->assignedTo;
      $assigned->save();
      return $assigned;
    }
    public function ticketPriority(Request $request)
    {
      $priority = Ticket::where('id',$request->ticket_id)->first();
      $priority -> priority_id = $request->priority;
      $priority->save();
      return $priority;
    }
    public function ticketStatus(Request $request)
    {
      $status = Ticket::where('id',$request->ticket_id)->first();
      $status -> ticket_status_id = $request-> status;
      $status->save();
      return $status;
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
