<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Contact;
use APP\User;
use Auth;
use Illuminate\Http\Request;
=======
use Illuminate\Http\Request;
use App\User;
>>>>>>> 78d19087394ffb5d2d13ae4ee41eb126ae5fd839

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
<<<<<<< HEAD
      $users = User::all();
      return view('contacts.index',compact('users'));
=======
        $users = User::all();
        return view('contacts.index',compact('users'));
>>>>>>> 78d19087394ffb5d2d13ae4ee41eb126ae5fd839
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
        //
    }

    /**
     * Display the specified resource.
     *
<<<<<<< HEAD
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
=======
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
>>>>>>> 78d19087394ffb5d2d13ae4ee41eb126ae5fd839
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
<<<<<<< HEAD
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
=======
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
>>>>>>> 78d19087394ffb5d2d13ae4ee41eb126ae5fd839
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
<<<<<<< HEAD
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
=======
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
>>>>>>> 78d19087394ffb5d2d13ae4ee41eb126ae5fd839
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
<<<<<<< HEAD
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
=======
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
>>>>>>> 78d19087394ffb5d2d13ae4ee41eb126ae5fd839
    {
        //
    }
}
