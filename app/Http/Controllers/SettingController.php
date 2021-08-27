<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Spatie\Permission\Models\Role;
use App\Exports\UserExport;
use App\Imports\UserImport;
use Maatwebsite\Excel\Facades\Excel;

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
        'abteilung' => 'required',
        'tel' => 'required',
        'ort' => 'required',
        'straße' => 'required',
        'plz' => 'required',
        'vorname' => 'required',
        'name' => 'required',
        'title' => 'required',
        ]);

        $importuser = [[
          $request->username,
          $request->position,
          $request->abteilung,
          $request->tel,
          $request->fax,
          $request->ort,
          $request->straße,
          $request->plz,
          $request->title,
          $request->vorname,
          $request->name,
          $request->mobil,
          $request->privat,
          $request->email_privat,
          $request->abschluss,
          $request->office,
          ]];
        try {
          $importuser = Excel::toArray(new UserImport, 'updateuser.csv','local');
          $importuser = $importuser[0];
          $importuser[] = [
            $request->username,
            $request->position,
            $request->abteilung,
            $request->tel,
            $request->fax,
            $request->ort,
            $request->straße,
            $request->plz,
            $request->title,
            $request->vorname,
            $request->name,
            $request->mobil,
            $request->privat,
            $request->email_privat,
            $request->abschluss,
            $request->office,
          ];
        }
        catch (\Exception $e) {
          ;
        }
        Excel::store(new UserExport($importuser), 'updateuser.csv','local');

        $input = $request->all();
        $user = User::find($id);
        $user->update($input);     
        $sucMsg = array(
          'message' => 'Erfolgreich bearbeitet',
          'alert-type' => 'success'
        );
        
        return redirect()->route('inventory')->with($sucMsg);
    }
		//** Settings index **//
		public function index()
		{
			return view('settings.index');
		}
}

