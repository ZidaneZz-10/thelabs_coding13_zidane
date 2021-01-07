<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams=Team::all();
        return view("admin.team.team",compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.team.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $membre = new Team;
        $membre->image = $request->file('image')->hashName();
        $membre->nom=$request->nom;
        $membre->fonction=$request->fonction;
        $membre->save();
        $request->file('image')->storePublicly('img/team', 'public');
        return redirect('/team');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $team=Team::find($id);
        return view('admin.team.edit',compact('team'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update = Team::find($id);
        if ($request->hasFile('image')) {
            // Do something with the file
            $file = $request->file('image');
        }
        $update->image = $request->file('image')->hashName();
        $update->nom=$request->nom;
        $update->fonction=$request->fonction;
        $update->save();
        // Storage::disk('public')->delete('img/team/' . $update->image);
        $request->file('image')->storePublicly('img/team', 'public');
        return redirect('/team');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Team::find($id);
        // Storage::disk('public')->delete('img/team' . $delete->image);
        $delete->delete();
        return redirect()->back();
    }
}
