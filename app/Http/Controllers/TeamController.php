<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\TeamTitle;
use App\Models\User;
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
        $titles=TeamTitle::all();
        return view("admin.team.team",compact('teams','titles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teams=Team::all();
        $users=User::all();
        return view('admin.team.create',compact('users','teams'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'user_id' => 'required',
            'fonction' => 'required',
        ]);
        $membre = new Team;
        $membre->user_id=$request->user_id;
        $membre->fonction=$request->fonction;
        $this->authorize('webmaster');
        $membre->save();
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
        $update->fonction=$request->fonction;
        $this->authorize('webmaster');
        $update->save();
        return redirect('/team');
    }
    public function update2(Request $request, $id)
    {
        $update = TeamTitle::find($id);
        $update->titre=$request->titre;
        $this->authorize('webmaster');
        $update->save();
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
        $this->authorize('webmaster');
        $delete->delete();
        return redirect()->back();
    }
}
