<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Categorie;
use Illuminate\Http\Request;
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
        $articles = Article::select(
            'articles.id',
            'articles.titre',
            'articles.image',
            'articles.contenu',
            'articles.created_at',
            'categories.titre as categorie',
            'users.name'
        )->join('users', 'articles.user_id', 'users.id')
            ->join('categories', 'articles.category_id', 'categories.id')
            ->get();

        return view('articles.liste_articles', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categorie::all();

        return view('articles.ajout_article', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|max:255',
            'contenu' => 'required',
            'category_id' => 'required',
            'user_id' => 'required'
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $image_name);
        } else {
            $image_name = 'noimage.jpg';
        }

        $article = new Article();
        $article->titre = $request->titre;
        $article->contenu = $request->contenu;
        $article->image = '$request->image';
        // $article->category_id = $request->category_id;

        // TODO: create article_has_category table

        $article->category_id = 1;

        $article->user_id = $request->user_id;
        $article->save();

        return true;
    }

    public function saveImageCover(Request $request)
    {
        $image = $request->file('file');
        $image_name = time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $image_name);

        return response()->json(['success' => $image_name]);
    }

    public function destroyImageCover(Request $request)
    {
        $image_name = $request->imageName;
        $image_path = public_path('/images/' . $image_name);
        if (file_exists($image_path)) {
            Storage::delete($image_path);
        }
        return false;
        // return redirect()->back()    
        //     ->with('success', $image_name . ' has been deleted');
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //
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
    public function destroy(Article $article)
    {
        //
    }
}
