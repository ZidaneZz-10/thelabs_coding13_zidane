<?php

namespace App\Http\Controllers;

use App\Mail\ArticleMail;
use App\Models\Article;
use App\Models\Categorie;
use App\Models\Commentaire;
use App\Models\Newsletter;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

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
        $commentaires=Commentaire::all();
        return view('admin.article.article',compact('articles','commentaires'));
    }
    public function index2()
    {
        $articles=Article::all();
        $commentaires=Commentaire::all();
        return view('admin.article.attente',compact('articles','commentaires'));
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
        $newArticle->statut=$request->statut;
        $newArticle->user_id=Auth::id();
        $newArticle->save();
        $request->file('image')->storePublicly('img', 'public');
        $newArticle->tags()->syncWithoutDetaching($request->tags);
        $newArticle->categories()->syncWithoutDetaching($request->cats);
        return redirect('/articles');
    }
    public function update2(Request $request,$id)
    {
        $mails=Newsletter::all();
        $accepter = Article::find($id);
        $accepter->statut = $request->statut; 
        $accepter->save();
        foreach ($mails as $mail) {
            Mail::to($mail->email)->send(new ArticleMail($request));
        }
        return redirect()->back(); 
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
        $commentaires=Commentaire::all();
        return view("admin.article.show",compact('article','commentaires'));
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
        $tableauTags = [];

        foreach ($article->tags as $tag) {
            $tableauTags[] = $tag->id;
        }
        $tableauCats = [];

        foreach ($article->categories as $categorie) {
            $tableauCats[] = $categorie->id;
        }
        return view('admin.article.edit',compact('article','tags','categories','tableauCats','tableauTags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $newArticle = Article::find($id);

        $newArticle->titre = $request->titre;
        $newArticle->texte = $request->texte;
        $newArticle->user_id = Auth::user()->id;
        $newArticle->status=$request->status;
        $newArticle->image = $request->file('image')->hashName();
        $newArticle->save();
        $newArticle->categories()->detach();
        $newArticle->tags()->detach();
        $newArticle->tags()->syncWithoutDetaching($request->tags);
        $newArticle->categories()->syncWithoutDetaching($request->cats);
        // Storage::disk('public')->delete('img/' . $newArticle->image);
        $request->file('image')->storePublicly('img','public');
        return redirect('/articles');
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
        $delete->delete();
        return redirect()->back();
    }
}
