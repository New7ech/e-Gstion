@extends('layouts.app')

{{-- Section pour le titre de la page --}}
@section('title', 'Statistiques Générales')

{{-- Section pour le contenu principal de la page --}}
@section('contenus')

{{-- En-tête de la page avec titre et fil d'Ariane --}}
<div class="page-header">
    <h3 class="fw-bold mb-3">Statistiques de l'Application</h3>
    <ul class="breadcrumbs mb-3">
        <li class="nav-home">
            <a href="{{ route('accueil') }}">
                <i class="icon-home"></i>
            </a>
        </li>
        <li class="separator">
            <i class="icon-arrow-right"></i>
        </li>
        <li class="nav-item">
            <a href="#">Statistiques</a>
        </li>
    </ul>
</div>

{{-- Conteneur principal pour les statistiques --}}
<div class="row">
    {{-- Cartes de résumé --}}
    <div class="col-sm-6 col-md-3">
        <div class="card card-stats card-round">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-icon"><div class="icon-big text-center icon-primary bubble-shadow-small"><i class="fas fa-box-open"></i></div></div>
                    <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                            <p class="card-category">Articles en Stock</p>
                            <h4 class="card-title">{{ $totalArticlesInStock ?? 0 }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-3">
        <div class="card card-stats card-round">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-icon"><div class="icon-big text-center icon-success bubble-shadow-small"><i class="fas fa-hand-holding-usd"></i></div></div>
                    <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                            <p class="card-category">Revenu (30j)</p>
                            <h4 class="card-title">{{ number_format($totalSalesRevenueLast30Days ?? 0, 0, ',', ' ') }} FCFA</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-3">
        <div class="card card-stats card-round">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-icon"><div class="icon-big text-center icon-info bubble-shadow-small"><i class="fas fa-file-invoice"></i></div></div>
                    <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                            <p class="card-category">Factures (30j)</p>
                            <h4 class="card-title">{{ $totalFacturesLast30Days ?? 0 }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-3">
        <div class="card card-stats card-round">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-icon"><div class="icon-big text-center icon-warning bubble-shadow-small"><i class="fas fa-users"></i></div></div>
                    <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                            <p class="card-category">Clients Actifs</p>
                            <h4 class="card-title">{{ $totalClientsActifs ?? 0 }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Ligne pour les graphiques principaux --}}
<div class="row">
    {{-- Graphique des tendances des ventes --}}
    <div class="col-md-8">
        <div class="card card-round">
            <div class="card-header">
                <div class="card-head-row">
                    <h4 class="card-title">Tendances des Ventes (30 derniers jours)</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="chart-container" style="height: 350px">
                    <canvas id="salesTrendChart"></canvas>
                </div>
            </div>
        </div>
    </div>
    {{-- Graphique des articles par catégorie --}}
    <div class="col-md-4">
        <div class="card card-round">
            <div class="card-header">
                <h4 class="card-title">Répartition des Articles par Catégorie</h4>
            </div>
            <div class="card-body">
                <div class="chart-container" style="height: 350px">
                    <canvas id="articlesPerCategoryChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Ligne pour le top des articles vendus et les articles à stock faible --}}
<div class="row">
    {{-- Top 5 des articles les plus vendus --}}
    <div class="col-md-7">
        <div class="card card-round">
            <div class="card-header">
                <h4 class="card-title">Top 5 Meilleurs Articles Vendus (Quantité, 30 derniers jours)</h4>
            </div>
            <div class="card-body">
                <div class="chart-container" style="height: 320px">
                    <canvas id="bestSellingArticlesChart"></canvas>
                </div>
            </div>
        </div>
    </div>
    {{-- Articles à stock faible --}}
    <div class="col-md-5">
        <div class="card card-round">
            <div class="card-header">
                <h4 class="card-title">Articles à Stock Faible (<= 5 unités)</h4>
                <div class="card-category">Nécessitent une attention pour réapprovisionnement.</div>
            </div>
            <div class="card-body">
                @if(isset($lowStockArticles) && $lowStockArticles->isNotEmpty())
                    <div class="table-responsive" style="max-height: 280px; overflow-y: auto;">
                        <table class="table table-sm table-striped table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>Article</th>
                                    <th class="text-end">Quantité</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($lowStockArticles as $article)
                                <tr>
                                    <td>
                                        <a href="{{ route('articles.show', $article->id) }}" data-bs-toggle="tooltip" title="Voir {{ $article->name }}">
                                            {{ Str::limit($article->name, 35) }}
                                        </a>
                                    </td>
                                    <td class="text-end fw-bold text-danger">{{ $article->quantite }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-warning btn-xs" data-bs-toggle="tooltip" title="Modifier/Réapprovisionner">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-4">
                        <i class="fas fa-check-circle fa-2x text-success mb-2"></i>
                        <p class="text-muted mb-0">Aucun article à stock faible pour le moment.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
{{-- Chart.js est déjà inclus globalement --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
    // Fonction pour générer des couleurs pour les graphiques
    function generateChartColors(numColors) {
        const baseColors = ["#5793ff", "#ff6384", "#36a2eb", "#ffce56", "#4bc0c0", "#9966ff", "#ff9f40", "#E7E9ED", "#707070", "#FFD700", "#ADFF2F", "#00FFFF"];
        let colors = [];
        for (let i = 0; i < numColors; i++) {
            colors.push(baseColors[i % baseColors.length]);
        }
        return colors;
    }

    // Graphique des Tendances des Ventes (Line Chart)
    const salesTrendCanvas = document.getElementById('salesTrendChart');
    const salesTrendLabels = typeof @json($salesTrendLabels ?? null) === 'object' ? @json($salesTrendLabels ?? []) : [];
    const salesTrendData = typeof @json($salesTrendData ?? null) === 'object' ? @json($salesTrendData ?? []) : [];

    if (salesTrendCanvas && salesTrendLabels.length > 0 && salesTrendData.length > 0) {
        new Chart(salesTrendCanvas.getContext('2d'), {
            type: 'line',
            data: {
                labels: salesTrendLabels,
                datasets: [{
                    label: 'Ventes Journalières (FCFA)',
                    data: salesTrendData,
                    borderColor: '#177dff',
                    backgroundColor: 'rgba(23, 125, 255, 0.2)',
                    fill: true,
                    tension: 0.3,
                    pointBackgroundColor: '#177dff',
                    pointRadius: 3
                }]
            },
            options: {
                responsive: true, maintainAspectRatio: false,
                plugins: { legend: { display: false }, tooltip: { callbacks: { label: ctx => `${ctx.dataset.label}: ${ctx.parsed.y.toLocaleString('fr-FR')} FCFA` }}},
                scales: { y: { beginAtZero: true, ticks: { callback: val => val.toLocaleString('fr-FR') + ' FCFA' }}, x: { grid: { display: false }}}
            }
        });
    } else if(salesTrendCanvas) {
        const ctx = salesTrendCanvas.getContext('2d');
        ctx.textAlign = 'center'; ctx.textBaseline = 'middle'; ctx.font = '14px Public Sans';
        ctx.fillText('Pas de données de ventes pour cette période.', salesTrendCanvas.width / 2, salesTrendCanvas.height / 2);
    }

    // Graphique Articles par Catégorie (Doughnut Chart)
    const articlesPerCategoryCanvas = document.getElementById('articlesPerCategoryChart');
    const articlesPerCategoryLabels = typeof @json($articlesPerCategoryLabels ?? null) === 'object' ? @json($articlesPerCategoryLabels ?? []) : [];
    const articlesPerCategoryData = typeof @json($articlesPerCategoryData ?? null) === 'object' ? @json($articlesPerCategoryData ?? []) : [];

    if (articlesPerCategoryCanvas && articlesPerCategoryLabels.length > 0 && articlesPerCategoryData.length > 0) {
        new Chart(articlesPerCategoryCanvas.getContext('2d'), {
            type: 'doughnut', // ou 'pie'
            data: {
                labels: articlesPerCategoryLabels,
                datasets: [{
                    label: 'Articles',
                    data: articlesPerCategoryData,
                    backgroundColor: generateChartColors(articlesPerCategoryLabels.length),
                    hoverOffset: 4,
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true, maintainAspectRatio: false,
                plugins: { legend: { position: 'bottom', labels: {padding: 10, boxWidth:12, font:{size:10}} }, tooltip: { callbacks: { label: ctx => `${ctx.label}: ${ctx.parsed} article(s)` }}}
            }
        });
    } else if (articlesPerCategoryCanvas) {
        const ctx = articlesPerCategoryCanvas.getContext('2d');
        ctx.textAlign = 'center'; ctx.textBaseline = 'middle'; ctx.font = '14px Public Sans';
        ctx.fillText('Pas de données de catégorie.', articlesPerCategoryCanvas.width / 2, articlesPerCategoryCanvas.height / 2);
    }

    // Graphique Top 5 Meilleurs Articles Vendus (Bar Chart)
    const bestSellingArticlesCanvas = document.getElementById('bestSellingArticlesChart');
    const bestSellingArticlesLabels = typeof @json($bestSellingArticlesLabels ?? null) === 'object' ? @json($bestSellingArticlesLabels ?? []) : [];
    const bestSellingArticlesData = typeof @json($bestSellingArticlesData ?? null) === 'object' ? @json($bestSellingArticlesData ?? []) : [];

    if (bestSellingArticlesCanvas && bestSellingArticlesLabels.length > 0 && bestSellingArticlesData.length > 0) {
        new Chart(bestSellingArticlesCanvas.getContext('2d'), {
            type: 'bar',
            data: {
                labels: bestSellingArticlesLabels,
                datasets: [{
                    label: 'Quantité Vendue',
                    data: bestSellingArticlesData,
                    backgroundColor: generateChartColors(bestSellingArticlesLabels.length).map(color => color.replace('0.7', '0.6')), // Légèrement plus clair
                    borderColor: generateChartColors(bestSellingArticlesLabels.length),
                    borderWidth: 1
                }]
            },
            options: {
                indexAxis: 'y', // Barres horizontales pour meilleure lisibilité des noms d'articles
                responsive: true, maintainAspectRatio: false,
                plugins: { legend: { display: false } }, // Pas besoin de légende pour un seul dataset
                scales: { x: { beginAtZero: true, ticks: { stepSize: 1 } } } // Axe X pour les quantités
            }
        });
    } else if (bestSellingArticlesCanvas) {
        const ctx = bestSellingArticlesCanvas.getContext('2d');
        ctx.textAlign = 'center'; ctx.textBaseline = 'middle'; ctx.font = '14px Public Sans';
        ctx.fillText('Pas de données sur les meilleurs articles vendus.', bestSellingArticlesCanvas.width / 2, bestSellingArticlesCanvas.height / 2);
    }

    // Initialisation des tooltips Bootstrap
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
});
</script>
@endpush
