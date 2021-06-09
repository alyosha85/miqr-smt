<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Spatie\Permission\Models\Role;

class SettingController extends Controller
{

  function __construct()
    {
    $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
    $this->middleware('permission:role-create', ['only' => ['create','store']]);
    $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
    $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }


  public function firstpage($id) 
    {
      $user = User::findorfail($id);
      return view ('settings.firstpage',compact('user'));
    }

    

  public function firstupdate(Request $request,$id) 
    {
      $this->validate($request, [
        'position' => 'required',
        'tel' => 'required',
        'email' => 'required',
        'straße' => 'required'
        ]);
        $input = $request->all();
        $user = User::find($id);
        $user->update($input);     
        $sucMsg = array(
          'message' => 'Erfolgreich bearbeitet',
          'alert-type' => 'success'
        );
        
        return redirect()->route('users.thankyou')->with($sucMsg);
    }
		//** Settings index **//
		public function index()
		{
			return view('settings.index');
		}


}

