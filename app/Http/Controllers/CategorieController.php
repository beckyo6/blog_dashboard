<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $categories = Categorie::all();

        return view('categories.liste_categories', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('categories.ajout_categorie');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request): Response
    {
        $validated = $request->validate([
            'titre' => 'required',
            'user_id' => 'required',
        ]);

        $categorie = Categorie::create($validated);

        if ($categorie) {
            return redirect()->route('categories.index')->withSuccess('catégorie créer avec succès');
        }
        redirect()->back()->withInput()->withError('erreur à la création de la categorie ');
    }

    /**
     * Display the specified resource.
     *
     * @param Categorie $categorie
     * @return Response
     */
    public function show(Categorie $categorie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Categorie $categorie
     * @return Application|Factory|View|Response
     */
    public function edit(Categorie $categorie)
    {
        $data = [
            'categorie' => $categorie,
            'id' => $categorie->id,
        ];

        // je ne comprend pourquoi tu as besoin d'envoyer id alors que tu peux recuperér l'id dans le model
        return view('categories.update_categorie', $data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Categorie $categorie
     * @return Response
     */
    public function update(Request $request, Categorie $categorie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Categorie $categorie
     * @return RedirectResponse
     */
    public function destroy(Categorie $categorie): RedirectResponse
    {
       if( $categorie->delete()){
           return redirect()->route('categories.index')->withSuccess('catégorie supprimer avec succès');
       }
       return redirect()->back()->withError('erreur à la suppression de la categorie');
    }
}
