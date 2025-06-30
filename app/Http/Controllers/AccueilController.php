<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
// Models nécessaires pour le tableau de bord
use App\Models\Article;
use App\Models\Facture;
use App\Models\Fournisseur;
use App\Models\Categorie; // Ajout du modèle Categorie
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
// Les StoreAccueilRequest et UpdateAccueilRequest ne sont probablement pas nécessaires si AccueilController ne gère que l'affichage.
// use App\Http\Requests\StoreAccueilRequest;
// use App\Http\Requests\UpdateAccueilRequest;
// Le modèle Accueil n'est pas utilisé si c'est juste pour afficher le dashboard.
// use App\Models\Accueil;


class AccueilController extends Controller
{
    /**
     * Affiche le tableau de bord principal de l'application.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Données pour les cartes de statistiques rapides
        $nombreFournisseurs = Fournisseur::count();
        $nombreFactures = Facture::count(); // Total des factures
        $chiffreAffairesMoisCourant = Facture::whereYear('date_facture', now()->year)
                                             ->whereMonth('date_facture', now()->month)
                                             ->sum('montant_ttc');
        $seuilStockFaible = 5; // Peut être mis en configuration
        $articlesEnAlerteStock = Article::where('quantite', '<=', $seuilStockFaible)->count();

        // Données pour le graphique des ventes journalières (7 derniers jours)
        $ventesQuery = Facture::select(
                DB::raw('DATE(date_facture) as date'),
                DB::raw('SUM(montant_ttc) as total_ventes')
            )
            ->where('date_facture', '>=', Carbon::now()->subDays(6)) // 6 jours avant + aujourd'hui = 7 jours
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();

        $ventesJournalieresLabels = [];
        $ventesJournalieresData = [];
        $period = Carbon::now()->subDays(6);
        for ($i = 0; $i < 7; $i++) {
            $dateStr = $period->format('Y-m-d');
            $ventesJournalieresLabels[] = $period->format('d/m');
            $venteDuJour = $ventesQuery->firstWhere('date', $dateStr);
            $ventesJournalieresData[] = $venteDuJour ? $venteDuJour->total_ventes : 0;
            $period->addDay();
        }
        $ventesJournalieres = [
            'labels' => $ventesJournalieresLabels,
            'data' => $ventesJournalieresData,
        ];


        // Données pour le graphique de répartition des articles par catégorie
        $categoriesData = Categorie::withCount('articles')->has('articles')->get(); // Uniquement les catégories avec des articles
        $articlesParCategorieLabels = $categoriesData->pluck('name')->toArray();
        $articlesParCategorieData = $categoriesData->pluck('articles_count')->toArray();

        // Données pour la table des articles récents
        $articlesRecents = Article::with('category') // Eager load la catégorie pour éviter N+1 requêtes
                                   ->orderBy('updated_at', 'desc')
                                   ->take(5)
                                   ->get();

        // Passer toutes les variables à la vue du tableau de bord
        return view('Accueil.index', compact(
            'nombreFournisseurs',
            'nombreFactures',
            'chiffreAffairesMoisCourant',
            'articlesEnAlerteStock',
            'ventesJournalieres',
            'articlesParCategorieLabels',
            'articlesParCategorieData',
            'articlesRecents',
            'seuilStockFaible' // Optionnel, si utilisé dans la vue pour la coloration
        ));
    }

    // Les autres méthodes (create, store, show, edit, update, destroy) du contrôleur resourceful Accueil
    // ne sont probablement pas nécessaires si ce contrôleur sert uniquement à afficher le tableau de bord.
    // Elles peuvent être supprimées si la route `Route::resource('accueil', AccueilController::class);`
    // est remplacée par une simple route GET pour la méthode index, comme c'est déjà le cas pour '/'.
    // Route::get('/', [App\Http\Controllers\AccueilController::class, 'index'])->name('accueil');
    // Si Route::resource('accueil', ...) est conservé, ces méthodes doivent exister même si vides.

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Inutilisé pour un simple tableau de bord, sauf si "accueil" est une ressource gérable.
        abort(404);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(/*StoreAccueilRequest $request*/) // Le RequestObject serait spécifique
    {
        // Inutilisé
        abort(404);
    }

    /**
     * Display the specified resource.
     */
    public function show(/*Accueil $accueil*/) // Le modèle Accueil serait spécifique
    {
        // Inutilisé
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(/*Accueil $accueil*/)
    {
        // Inutilisé
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(/*UpdateAccueilRequest $request, Accueil $accueil*/)
    {
        // Inutilisé
        abort(404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(/*Accueil $accueil*/)
    {
        // Inutilisé
        abort(404);
    }
}
