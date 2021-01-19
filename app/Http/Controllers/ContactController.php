<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\ContactIntro;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts=Contact::all();
        $ContactIntros=ContactIntro::all();
        return view('admin.contact.contact',compact('contacts','ContactIntros'));
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
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact=Contact::find($id);
        return view('admin.contact.edit',compact('contact'));
    }
    public function edit2($id)
    {
        $contactIntro=ContactIntro::find($id);
        return view('admin.contact.edit2',compact('contactIntro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $update=Contact::find($id);
        $update->titre = $request->titre;
        $update->lieu = $request->lieu;
        $update->tel = $request->tel;
        $update->mail = $request->mail;
        $this->authorize('webmaster');
        $update->save();
        return redirect('/contact');

    }
    public function update2(Request $request,$id)
    {
        $update=ContactIntro::find($id);
        $update->titre = $request->titre;
        $update->texte = $request->texte;
        $this->authorize('webmaster');
        $update->save();
        return redirect('/contact');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
