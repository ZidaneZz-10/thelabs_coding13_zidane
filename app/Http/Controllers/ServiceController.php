<?php

namespace App\Http\Controllers;

use App\Models\Icon;
use App\Models\Service;
use App\Models\ServiceTitle;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services=Service::all();
        $titles=ServiceTitle::all();
        return view('admin.services.services',compact('services','titles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $icons=Icon::all();
        return view('admin.services.create',compact('icons'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newService= new Service;
        $newService->titre=$request->titre;
        $newService->texte=$request->texte;
        $newService->icon_id=$request->icon_id;
        $newService->save();
        return redirect('/service');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service=Service::find($id);
        $icons=Icon::all();
        return view('admin.services.edit',compact('service','icons'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update=Service::find($id);
        $update->titre = $request->titre;
        $update->texte = $request->texte;
        $update->icon_id = $request->icon_id;
        $update->save();
        return redirect('/service');
    }
    public function update2(Request $request, $id)
    {
        $update = ServiceTitle::find($id);
        $update->titre=$request->titre;
        $update->save();
        return redirect('/service');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Service::find($id);
        $delete->delete();
        return redirect()->back();
    }
}
