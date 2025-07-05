<?php

namespace App\Http\Controllers;

use App\Models\Article; // Assurez-vous que ce modèle existe et correspond à vos produits
use App\Models\Categorie; // Assurez-vous que ce modèle existe
use App\Http\Controllers\Controller;
// Les autres use non nécessaires pour cette méthode index ont été retirés pour la clarté
// Si Accueil, Facture etc. sont utilisés par d'autres méthodes, ils peuvent rester.

class AccueilController extends Controller
{
    /**
     * Display a listing of the resource for the e-commerce homepage.
     */
    public function index()
    {
        // Récupérer, par exemple, les 4 premières catégories ou celles marquées comme "populaires"
        // Si vous avez un champ 'est_populaire' (booléen) dans votre table catégories :
        // $categories = Categorie::where('est_populaire', true)->take(4)->get();
        // Sinon, prenons simplement les premières pour l'exemple :
        $categories = Categorie::take(4)->get();

        // Récupérer, par exemple, les 8 produits/articles les plus récents ou "en vedette"
        // Si vous avez un champ 'est_en_vedette' (booléen) :
        // $produits = Article::where('est_en_vedette', true)->latest()->take(8)->get();
        // Sinon, prenons les plus récents :
        $produits = Article::latest()->take(8)->get(); // 'latest()' trie par 'created_at' DESC

        // Passer les variables à la vue 'home.blade.php'
        return view('home', compact(
            'categories',
            'produits'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Logique pour la création si nécessaire pour l'administration de Accueil
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(/*StoreAccueilRequest $request*/) // Type-hinting commenté si non utilisé
    {
        // Logique de stockage si nécessaire
    }

    /**
     * Display the specified resource.
     */
    public function show(/*Accueil $accueil*/) // Type-hinting commenté si non utilisé
    {
        // Logique d'affichage d'un 'Accueil' spécifique si pertinent
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(/*Accueil $accueil*/) // Type-hinting commenté si non utilisé
    {
        // Logique d'édition
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(/*UpdateAccueilRequest $request, Accueil $accueil*/) // Type-hinting commenté si non utilisé
    {
        // Logique de mise à jour
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(/*Accueil $accueil*/) // Type-hinting commenté si non utilisé
    {
        // Logique de suppression
    }
}
