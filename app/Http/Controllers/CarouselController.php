<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use App\Models\TextCarousel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarouselController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $imgCarousel = Carousel::all();
        return view("admin.carousel.image.image", compact('imgCarousel'));
    }
    public function index2()
    {
        $texts = TextCarousel::all();
        return view("admin.carousel.texte.texte", compact('texts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.carousel.image.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $newimg = new Carousel;
        $newimg->image = $request->file('image')->hashName();
        $newimg->save();
        $request->file('image')->storePublicly('img', 'public');
        return redirect('/carouselimg');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Carousel  $carousel
     * @return \Illuminate\Http\Response
     */
    public function show(Carousel $carousel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Carousel  $carousel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $imgCarousel = Carousel::find($id);
        return view('admin.carousel.image.edit', compact('imgCarousel'));
    }
    public function edit2($id)
    {
        $text = TextCarousel::find($id);
        return view('admin.carousel.texte.edit', compact('text'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Carousel  $carousel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update = Carousel::find($id);
        $update->image = $request->file('image')->hashName();
        $update->save();
        Storage::disk('public')->delete('img/' . $update->image);
        $request->file('image')->storePublicly('img', 'public');
        return redirect('/');
    }
    public function update2(Request $request, $id)
    {
        $update = TextCarousel::find($id);
        $update->texte = $request->texte;
        $update->save();
        return redirect('/carouselTxt');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Carousel  $carousel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Carousel::find($id);
        Storage::disk('public')->delete('img/' . $delete->image);
        $delete->delete();
        return redirect()->back();
    }
}
