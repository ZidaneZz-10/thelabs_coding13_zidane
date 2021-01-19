<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Testimonial;
use App\Models\TestimonialTitle;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials=Testimonial::all();
        $titles=TestimonialTitle::all();
        return view('admin.testimonials.testimonials',compact('testimonials','titles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teams=Team::all();
        return view('admin.testimonials.create',compact('teams'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newTestimonial= new Testimonial;
        $newTestimonial->avis=$request->avis;
        $newTestimonial->team_id=$request->team_id;
        $this->authorize('webmaster');
        $newTestimonial->save();
        return redirect('/testimonials');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teams=Team::all();
        $testimonial=Testimonial::find($id);
        return view('admin.testimonials.edit',compact('testimonial','teams'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update=Testimonial::find($id);
        $update->avis = $request->avis;
        $update->team_id = $request->team_id;
        $this->authorize('webmaster');
        $update->save();
        return redirect('/testimonials');
    }
    public function update2(Request $request, $id)
    {
        $update = TestimonialTitle::find($id);
        $update->titre=$request->titre;
        $this->authorize('webmaster');
        $update->save();
        return redirect('/testimonials');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Testimonial::find($id);
        $this->authorize('webmaster');
        $delete->delete();
        return redirect()->back();
    }
}
