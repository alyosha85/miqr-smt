<?php

namespace App\Http\Controllers\Matrix;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Berlin;

class BerlinController extends Controller
{
    public function index()
    {
      $matrix = Berlin::all();
      $section = Berlin::pluck('section')->unique();
      $area = Berlin::pluck('area')->unique();
      return view('matrix.berlin.trachenberg93',compact('matrix','section','area'));
    }
}
