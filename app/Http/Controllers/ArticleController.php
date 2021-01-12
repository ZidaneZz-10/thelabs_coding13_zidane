<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Categorie;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles=Article::all();
        return view('admin.article.article',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags=Tag::all();
        $categories=Categorie::all();
        return view('admin.article.create',compact("tags",'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newArticle= new Article;
        $newArticle->image = $request->file('image')->hashName();
        $newArticle->titre=$request->titre;
        $newArticle->texte=$request->texte;
        $newArticle->user_id=Auth::id();
        $newArticle->save();
        $request->file('image')->storePublicly('img', 'public');
        $newArticle->tags()->syncWithoutDetaching($request->tags);
        $newArticle->categories()->syncWithoutDetaching($request->cats);
        return redirect('/articles');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article=Article::find($id);
        return view("admin.article.show",compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article=Article::find($id);
        $tags=Tag::all();
        $categories=Categorie::all();
        return view('admin.article.edit',compact('article','tags','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete=Article::find($id);
        Article::find($id)->tags()->detach();
        Article::find($id)->categories()->detach();
        Article::find($id)->commentaires()->detach();
        $delete->delete();
        return redirect()->back();
    }
}
