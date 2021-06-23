<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $user = Auth::user();
      if (is_null($user->lastlogin)) {
        $id = $user->id;
        return redirect()->route('settings.firstpage',compact('id'));
      }
      return view('admin/admin_dashboard');
    }
}
