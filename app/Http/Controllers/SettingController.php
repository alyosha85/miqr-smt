<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingController extends Controller
{
		//** Settings index **//
		public function index()
		{
			return view('settings.index');
		}


}
