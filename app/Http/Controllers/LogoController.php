<?php

namespace App\Http\Controllers;

use App\Models\Logo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic;

class LogoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logo=Logo::all()[0];
        $imgPetit = ImageManagerStatic::make('img/' . $logo->image)->resize(111,32);
        $imgGrand = ImageManagerStatic::make('img/' . $logo->image)->resize(504,148);

        $imgPetit->save("img/imgPetit.png",100);
        $imgGrand->save("img/imgGrand.png",100);
        return view('admin.logo.logo',compact('logo','imgPetit','imgGrand'));
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
     * @param  \App\Models\Logo  $logo
     * @return \Illuminate\Http\Response
     */
    public function show(Logo $logo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Logo  $logo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $logo=Logo::find($id);
        return view('admin.logo.edit',compact('logo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Logo  $logo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update = Logo::find($id);
        $update->image = $request->file('image')->hashName();
        $this->authorize('admin');
        $update->save();
        Storage::disk('public')->delete('img/' . $update->image);
        $request->file('image')->storePublicly('img', 'public');
        return redirect('/logo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Logo  $logo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Logo $logo)
    {
        //
    }
}
