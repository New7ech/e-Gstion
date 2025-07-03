{{--
  Nom: home.blade.php
  Description: Page d'accueil du site e-commerce.
  Auteur: Jules - Assistant IA
  Date de création: {{ date('Y-m-d') }}
--}}

@extends('layouts.app') {{-- Étend le layout principal de KaiAdmin --}}

{{-- Section pour le titre de la page --}}
@section('title', 'Accueil - Votre Boutique en Ligne')

{{-- Section principale du contenu de la page --}}
@section('contenus')

  {{-- Wrapper principal pour le contenu de la page d'accueil --}}
  <div class="ecommerce-container mx-auto">

    {{-- En-tête du site e-commerce --}}
    <header class="bg-white shadow-md sticky top-0 z-50">
      <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
          {{-- Logo --}}
          <div class="flex-shrink-0">
            <a href="{{ url('/') }}" class="text-2xl font-bold text-gray-800">
              LOGO_SITE
              {{-- <img class="h-10 w-auto" src="{{ asset('path/to/your/logo.png') }}" alt="Logo de Votre Boutique"> --}}
            </a>
          </div>

          {{-- Barre de recherche (visible sur md et plus) --}}
          <div class="hidden md:flex flex-grow justify-center px-4">
            <form action="#" method="GET" class="w-full max-w-lg">
              <div class="relative">
                <input
                  type="search"
                  name="query"
                  placeholder="Rechercher un produit, une catégorie..."
                  class="w-full bg-gray-100 border border-gray-300 rounded-md py-2 px-4 pl-10 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                />
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                  {{-- Icône de recherche SVG --}}
                  <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z" clip-rule="evenodd" />
                  </svg>
                </div>
              </div>
            </form>
          </div>

          {{-- Menu, Panier, Compte --}}
          <div class="flex items-center space-x-4">
            <nav class="hidden lg:flex space-x-6">
              <a href="{{ url('/') }}" class="text-gray-600 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">Accueil</a>
              <a href="#" class="text-gray-600 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">Produits</a>
              {{-- Menu déroulant pour catégories --}}
              <div class="relative group">
                <button type="button" class="text-gray-600 group-hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium inline-flex items-center">
                  <span>Catégories</span>
                  <svg class="ml-2 h-4 w-4 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.25 4.25a.75.75 0 01-1.06 0L5.23 8.27a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                  </svg>
                </button>
                <div class="absolute z-10 -ml-4 mt-3 transform px-2 w-screen max-w-xs sm:px-0 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 ease-in-out">
                  <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden">
                    <div class="relative grid gap-6 bg-white px-5 py-6 sm:gap-8 sm:p-8">
                      {{-- Liens de catégories (placeholders) --}}
                      <a href="#" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50">
                        <div class="ml-4">
                          <p class="text-base font-medium text-gray-900">Électronique</p>
                        </div>
                      </a>
                      <a href="#" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50">
                        <div class="ml-4">
                          <p class="text-base font-medium text-gray-900">Vêtements</p>
                        </div>
                      </a>
                      <a href="#" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50">
                        <div class="ml-4">
                          <p class="text-base font-medium text-gray-900">Maison & Jardin</p>
                        </div>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <a href="#" class="text-gray-600 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">Promotions</a>
              <a href="#" class="text-gray-600 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">Blog</a>
              <a href="#" class="text-gray-600 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">Contact</a>
            </nav>

            {{-- Panier --}}
            <div class="flow-root">
              <a href="#" class="group -m-2 p-2 flex items-center text-gray-500 hover:text-blue-600">
                {{-- Icône Panier SVG --}}
                <svg class="h-6 w-6 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                </svg>
                <span class="ml-2 text-sm font-medium text-gray-700 group-hover:text-gray-800">0</span> {{-- Compteur d'articles --}}
                <span class="sr-only">articles dans le panier, voir le panier</span>
              </a>
            </div>

            {{-- Compte utilisateur --}}
            <div class="flow-root">
              <a href="#" class="group -m-2 p-2 flex items-center text-gray-500 hover:text-blue-600">
                {{-- Icône Utilisateur SVG --}}
                <svg class="h-6 w-6 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                </svg>
                <span class="sr-only">compte utilisateur</span>
              </a>
            </div>

            {{-- Bouton menu mobile (pour md et moins) --}}
            <div class="lg:hidden">
              <button type="button" id="mobile-menu-button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500" aria-controls="mobile-menu" aria-expanded="false">
                <span class="sr-only">Ouvrir le menu principal</span>
                {{-- Icône "menu" (hamburger) --}}
                <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
                {{-- Icône "fermer" (X) --}}
                <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
              </button>
            </div>
          </div>
        </div>

        {{-- Barre de recherche (visible sur sm et moins, en dehors du flux principal du header) --}}
        <div class="md:hidden border-t border-gray-200 py-3">
          <form action="#" method="GET" class="w-full">
            <div class="relative">
              <input
                type="search"
                name="query_mobile"
                placeholder="Rechercher..."
                class="w-full bg-gray-100 border border-gray-300 rounded-md py-2 px-4 pl-10 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
              />
              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z" clip-rule="evenodd" />
                </svg>
              </div>
            </div>
          </form>
        </div>
      </div>

      {{-- Menu mobile déroulant --}}
      <div class="lg:hidden hidden" id="mobile-menu">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
          <a href="{{ url('/') }}" class="bg-blue-50 border-blue-500 text-blue-700 block rounded-md py-2 px-3 text-base font-medium" aria-current="page">Accueil</a>
          <a href="#" class="hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700 block rounded-md py-2 px-3 text-base font-medium">Produits</a>
          {{-- Menu déroulant mobile pour catégories --}}
          <div class="relative group">
            <button type="button" class="w-full text-left hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700 block rounded-md py-2 px-3 text-base font-medium items-center" onclick="toggleMobileSubmenu(this)">
              <span>Catégories</span>
              <svg class="ml-2 h-4 w-4 inline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.25 4.25a.75.75 0 01-1.06 0L5.23 8.27a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
              </svg>
            </button>
            <div class="hidden pl-4"> {{-- Sous-menu mobile --}}
              <a href="#" class="hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700 block rounded-md py-2 px-3 text-base font-medium">Électronique</a>
              <a href="#" class="hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700 block rounded-md py-2 px-3 text-base font-medium">Vêtements</a>
              <a href="#" class="hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700 block rounded-md py-2 px-3 text-base font-medium">Maison & Jardin</a>
            </div>
          </div>
          <a href="#" class="hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700 block rounded-md py-2 px-3 text-base font-medium">Promotions</a>
          <a href="#" class="hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700 block rounded-md py-2 px-3 text-base font-medium">Blog</a>
          <a href="#" class="hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700 block rounded-md py-2 px-3 text-base font-medium">Contact</a>
        </div>
      </div>
    </header>
    {{-- Fin de l'en-tête du site e-commerce --}}

    <main>
      {{-- Section Bannière Principale / Slider --}}
      <section class="bg-gradient-to-r from-blue-600 to-purple-600 text-white relative overflow-hidden" id="hero-banner">
        {{-- Idéalement, un carrousel JS serait utilisé ici. Pour une version statique : --}}
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-24 lg:py-32 text-center md:text-left">
          <div class="md:w-1/2 lg:w-3/5">
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold mb-6 leading-tight">
              Découvrez nos Nouveautés Exclusives
              {{-- Placeholder: {{ $banner->title ?? 'Titre de la bannière dynamique' }} --}}
            </h1>
            <p class="text-lg sm:text-xl lg:text-2xl mb-8 opacity-90">
              Des produits incroyables vous attendent. Explorez notre collection et trouvez votre bonheur.
              {{-- Placeholder: {{ $banner->subtitle ?? 'Sous-titre de la bannière' }} --}}
            </p>
            <a href="#produits-vedette" {{-- Lien vers la section produits ou une page spécifique --}}
               class="inline-block bg-white text-blue-600 font-semibold py-3 px-8 rounded-lg text-lg hover:bg-gray-100 hover:text-blue-700 transition duration-300 ease-in-out transform hover:scale-105">
              Voir la collection
              {{-- Placeholder: {{ $banner->cta_text ?? 'Appel à l'action' }} --}}
            </a>
          </div>
        </div>
        {{-- Image de fond ou image décorative. Pour un slider, cette image changerait. --}}
        {{-- Utilisation d'un placeholder d'image via placehold.co --}}
        <div class="hidden md:block absolute top-0 right-0 h-full w-1/2 lg:w-2/5" aria-hidden="true">
          <img src="https://placehold.co/800x600/E0E7FF/4F46E5?text=Bannière+Produit"
               alt="Image de bannière"
               class="object-cover object-center h-full w-full opacity-50 md:opacity-100">
          {{-- Placeholder: <img src="{{ asset($banner->image_url ?? 'path/to/default-banner.jpg') }}" alt="{{ $banner->alt_text ?? 'Image de bannière' }}" class="object-cover h-full w-full"> --}}
        </div>
         {{-- Version mobile de l'image si nécessaire, ou simplement laisser le fond coloré --}}
        <div class="md:hidden mt-8">
            <img src="https://placehold.co/600x400/E0E7FF/4F46E5?text=Bannière"
                 alt="Image de bannière mobile"
                 class="w-full h-auto rounded-lg shadow-md">
        </div>
      </section>
      {{-- Fin Section Bannière Principale --}}

      {{-- Section Catégories Populaires --}}
      <section id="categories-populaires" class="py-12 md:py-16 bg-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
          <h2 class="text-3xl font-bold text-gray-800 text-center mb-10">Catégories Populaires</h2>
          <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6 md:gap-8">
            {{-- Boucle Blade pour afficher les catégories (placeholders) --}}
            @php
              $popularCategories = [
                ['name' => 'Électronique', 'image' => 'https://placehold.co/300x200/DBEAFE/1E40AF?text=Électro', 'slug' => 'electronique'],
                ['name' => 'Mode Femme', 'image' => 'https://placehold.co/300x200/FCE7F3/831843?text=Mode+Femme', 'slug' => 'mode-femme'],
                ['name' => 'Mode Homme', 'image' => 'https://placehold.co/300x200/E0E7FF/1E3A8A?text=Mode+Homme', 'slug' => 'mode-homme'],
                ['name' => 'Maison & Cuisine', 'image' => 'https://placehold.co/300x200/FEF3C7/92400E?text=Maison', 'slug' => 'maison-cuisine'],
                ['name' => 'Beauté & Santé', 'image' => 'https://placehold.co/300x200/FEE2E2/991B1B?text=Beauté', 'slug' => 'beaute-sante'],
                // Ajoutez plus de catégories si nécessaire
              ];
            @endphp

            @foreach ($popularCategories as $category)
            <a href="{{ url('/categorie/' . $category['slug']) }}" class="group block rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300 ease-in-out">
              <div class="relative">
                <img src="{{ $category['image'] }}" alt="Image de la catégorie {{ $category['name'] }}" class="w-full h-40 sm:h-48 object-cover transition-transform duration-300 group-hover:scale-105">
                <div class="absolute inset-0 bg-black bg-opacity-20 group-hover:bg-opacity-10 transition-opacity duration-300"></div>
              </div>
              <div class="p-4 bg-white">
                <h3 class="text-md sm:text-lg font-semibold text-gray-800 group-hover:text-blue-600 transition-colors duration-300 text-center">{{ $category['name'] }}</h3>
              </div>
            </a>
            @endforeach
            {{-- Fin de la boucle --}}
          </div>
        </div>
      </section>
      {{-- Fin Section Catégories Populaires --}}

      {{-- Section Produits en Vedette --}}
      <section id="produits-vedette" class="py-12 md:py-16 bg-gray-50">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
          <h2 class="text-3xl font-bold text-gray-800 text-center mb-10">Nos Produits en Vedette</h2>
          {{-- Données placeholder pour les produits --}}
          @php
            $featuredProducts = [
              [
                'id' => 1,
                'name' => 'Smartphone Ultime X',
                'image' => 'https://placehold.co/400x400/E0E7FF/1C3D5A?text=Smartphone',
                'price' => 799.99,
                'oldPrice' => 899.99,
                'slug' => 'smartphone-ultime-x',
                'categoryName' => 'Électronique',
                'badge' => '-11%'
              ],
              [
                'id' => 2,
                'name' => 'Écouteurs Sans Fil Pro',
                'image' => 'https://placehold.co/400x400/DBEAFE/1E40AF?text=Écouteurs',
                'price' => 149.50,
                'slug' => 'ecouteurs-sans-fil-pro',
                'categoryName' => 'Audio',
              ],
              [
                'id' => 3,
                'name' => 'Montre Connectée Sport',
                'image' => 'https://placehold.co/400x400/D1FAE5/065F46?text=Montre',
                'price' => 249.00,
                'slug' => 'montre-connectee-sport',
                'categoryName' => 'Accessoires',
                'badge' => 'Nouveau'
              ],
              [
                'id' => 4,
                'name' => 'Chemise Élégante en Coton',
                'image' => 'https://placehold.co/400x400/FEF3C7/92400E?text=Chemise',
                'price' => 59.90,
                'slug' => 'chemise-elegante-coton',
                'categoryName' => 'Mode Homme',
              ],
               [
                'id' => 5,
                'name' => 'Sac à Main Cuir Véritable',
                'image' => 'https://placehold.co/400x400/FCE7F3/831843?text=Sac+à+Main',
                'price' => 120.00,
                'oldPrice' => 150.00,
                'slug' => 'sac-a-main-cuir',
                'categoryName' => 'Mode Femme',
                'badge' => '-20%'
              ],
              [
                'id' => 6,
                'name' => 'Cafetière Express Premium',
                'image' => 'https://placehold.co/400x400/E5E7EB/4B5563?text=Cafetière',
                'price' => 89.99,
                'slug' => 'cafetiere-express-premium',
                'categoryName' => 'Cuisine',
              ],
            ];
          @endphp

          <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-x-6 gap-y-10">
            {{-- Boucle pour afficher chaque produit en vedette --}}
            @foreach ($featuredProducts as $product)
              {{-- Utilisation du composant Blade x-ecommerce.product-card --}}
              {{-- La syntaxe correcte pour appeler un composant dans un sous-dossier est <x-nom-dossier.nom-composant /> --}}
              <x-ecommerce.product-card :product="$product" />
            @endforeach
          </div>

          {{-- Bouton "Voir tous les produits" (optionnel) --}}
          <div class="text-center mt-12">
            <a href="#" {{-- Lien vers la page de tous les produits --}}
               class="inline-block bg-blue-600 text-white font-semibold py-3 px-8 rounded-lg text-lg hover:bg-blue-700 transition duration-300 ease-in-out">
              Voir tous nos produits
            </a>
          </div>
        </div>
      </section>
      {{-- Fin Section Produits en Vedette --}}

      {{-- Section Offres Promotionnelles --}}
      <section id="offres-promotionnelles" class="py-12 md:py-16 bg-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
          <h2 class="text-3xl font-bold text-gray-800 text-center mb-10">Profitez de nos Offres Spéciales</h2>
          <div class="space-y-8">
            {{-- Offre 1 --}}
            <div class="relative rounded-lg overflow-hidden shadow-lg group">
              <img src="https://placehold.co/1200x400/DBEAFE/1E40AF?text=Promo+High-Tech" alt="Promotion High-Tech" class="w-full h-64 md:h-80 object-cover">
              <div class="absolute inset-0 bg-black bg-opacity-40 group-hover:bg-opacity-30 transition-opacity duration-300 flex flex-col items-center justify-center text-center p-6">
                <h3 class="text-3xl md:text-4xl font-bold text-white mb-3">Jusqu'à -30% sur le High-Tech</h3>
                <p class="text-lg text-gray-200 mb-6 max-w-md">Smartphones, ordinateurs, accessoires... Équipez-vous à prix réduit !</p>
                <a href="#" class="bg-yellow-400 text-gray-900 font-semibold py-3 px-8 rounded-lg text-lg hover:bg-yellow-300 transition duration-300 transform group-hover:scale-105">
                  Découvrir les offres
                </a>
              </div>
            </div>

            {{-- Offre 2 (Peut être une structure différente, ex: 2 colonnes sur desktop) --}}
            <div class="grid md:grid-cols-2 gap-8">
              <div class="relative rounded-lg overflow-hidden shadow-lg group">
                <img src="https://placehold.co/600x400/FCE7F3/831843?text=Promo+Mode" alt="Promotion Mode" class="w-full h-64 object-cover">
                <div class="absolute inset-0 bg-black bg-opacity-40 group-hover:bg-opacity-30 transition-opacity duration-300 flex flex-col items-center justify-center text-center p-6">
                  <h3 class="text-2xl md:text-3xl font-bold text-white mb-2">Nouvelle Collection Mode</h3>
                  <p class="text-md text-gray-200 mb-4">Les dernières tendances sont arrivées.</p>
                  <a href="#" class="bg-pink-500 text-white font-semibold py-2 px-6 rounded-lg hover:bg-pink-400 transition duration-300 transform group-hover:scale-105">
                    Shopper la collection
                  </a>
                </div>
              </div>
              <div class="relative rounded-lg overflow-hidden shadow-lg group">
                <img src="https://placehold.co/600x400/FEF3C7/92400E?text=Promo+Maison" alt="Promotion Maison" class="w-full h-64 object-cover">
                <div class="absolute inset-0 bg-black bg-opacity-40 group-hover:bg-opacity-30 transition-opacity duration-300 flex flex-col items-center justify-center text-center p-6">
                  <h3 class="text-2xl md:text-3xl font-bold text-white mb-2">Tout pour la Maison</h3>
                  <p class="text-md text-gray-200 mb-4">Décoration, meubles, et plus encore.</p>
                  <a href="#" class="bg-amber-500 text-white font-semibold py-2 px-6 rounded-lg hover:bg-amber-400 transition duration-300 transform group-hover:scale-105">
                    Explorer
                  </a>
                </div>
              </div>
            </div>
            {{-- Placeholder pour un compte à rebours (nécessiterait JS) --}}
            {{--
            <div class="bg-gray-800 text-white p-8 rounded-lg text-center mt-8">
              <h4 class="text-2xl font-semibold mb-2">Offre Flash à Durée Limitée !</h4>
              <p class="text-lg mb-4">Ne manquez pas nos Ventes Flash exclusives.</p>
              <div id="countdown-timer" class="text-4xl font-bold text-yellow-400">
                00j 00h 00m 00s
              </div>
              <p class="text-sm mt-2">(Placeholder - nécessite JavaScript pour fonctionner)</p>
            </div>
            --}}
          </div>
        </div>
      </section>
      {{-- Fin Section Offres Promotionnelles --}}

      {{-- Section Témoignages Clients --}}
      <section id="temoignages-clients" class="py-12 md:py-16 bg-gray-50">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
          <h2 class="text-3xl font-bold text-gray-800 text-center mb-10">Ce que disent nos clients</h2>
          {{-- Pour un grand nombre de témoignages, un carrousel JS (Swiper.js, etc.) serait plus adapté --}}
          {{-- Ici, une grille simple pour l'exemple --}}
          @php
            $testimonials = [
              [
                'name' => 'Sophie D.',
                'location' => 'Paris, France',
                'avatar' => 'https://placehold.co/100x100/E0E7FF/4F46E5?text=SD',
                'rating' => 5,
                'comment' => "Service client incroyable et produits de très haute qualité. J'ai reçu ma commande rapidement. Je recommande vivement cette boutique !",
                'date' => '12 Mars 2024'
              ],
              [
                'name' => 'Marc L.',
                'location' => 'Lyon, France',
                'avatar' => 'https://placehold.co/100x100/DBEAFE/1E40AF?text=ML',
                'rating' => 4,
                'comment' => "Très satisfait de mon achat. Le produit correspondait parfaitement à la description. Seul petit bémol, le délai de livraison un peu plus long que prévu.",
                'date' => '28 Février 2024'
              ],
              [
                'name' => 'Amina K.',
                'location' => 'Marseille, France',
                'avatar' => null, // Pas d'avatar pour cet exemple
                'rating' => 5,
                'comment' => "Une expérience d'achat en ligne fluide et agréable. Le site est facile à naviguer et les prix sont compétitifs. Je reviendrai !",
                'date' => '05 Avril 2024'
              ],
            ];
          @endphp
          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($testimonials as $testimonial)
            <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col">
              <div class="flex items-center mb-4">
                @if($testimonial['avatar'])
                <img class="h-12 w-12 rounded-full object-cover mr-4" src="{{ $testimonial['avatar'] }}" alt="Avatar de {{ $testimonial['name'] }}">
                @else
                {{-- Placeholder pour avatar si non fourni --}}
                <span class="h-12 w-12 rounded-full bg-gray-300 flex items-center justify-center text-gray-600 font-semibold text-lg mr-4">
                  {{ strtoupper(substr($testimonial['name'], 0, 1)) . (strpos($testimonial['name'], ' ') ? strtoupper(substr(explode(' ', $testimonial['name'])[1], 0, 1)) : '') }}
                </span>
                @endif
                <div>
                  <p class="font-semibold text-gray-800">{{ $testimonial['name'] }}</p>
                  <p class="text-sm text-gray-500">{{ $testimonial['location'] }}</p>
                </div>
              </div>
              <div class="flex mb-2">
                @for ($i = 0; $i < 5; $i++)
                  <svg class="h-5 w-5 {{ $i < $testimonial['rating'] ? 'text-yellow-400' : 'text-gray-300' }}" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                  </svg>
                @endfor
              </div>
              <p class="text-gray-600 text-sm leading-relaxed mb-4 flex-grow">"{{ $testimonial['comment'] }}"</p>
              <p class="text-xs text-gray-400 text-right">{{ $testimonial['date'] }}</p>
            </div>
            @endforeach
          </div>
        </div>
      </section>
      {{-- Fin Section Témoignages Clients --}}

      {{-- Section Blog / Articles Récents --}}
      <section id="blog-recent" class="py-12 md:py-16 bg-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
          <h2 class="text-3xl font-bold text-gray-800 text-center mb-10">Nos Derniers Articles</h2>
          @php
            $recentPosts = [
              [
                'title' => '10 Astuces pour Choisir le Smartphone Parfait en 2024',
                'image' => 'https://placehold.co/400x250/DBEAFE/1E40AF?text=Blog+Tech',
                'category' => 'Technologie',
                'date' => '15 Avril 2024',
                'excerpt' => 'Le choix d\'un nouveau smartphone peut être compliqué. Découvrez nos conseils pour trouver celui qui correspond le mieux à vos besoins et à votre budget...',
                'slug' => '10-astuces-choisir-smartphone-2024',
                'author' => 'Jean Dupont'
              ],
              [
                'title' => 'Les Tendances Mode Printemps/Été à ne pas Manquer',
                'image' => 'https://placehold.co/400x250/FCE7F3/831843?text=Blog+Mode',
                'category' => 'Mode',
                'date' => '10 Avril 2024',
                'excerpt' => 'Soyez à la pointe de la mode cette saison ! Nous décryptons pour vous les couleurs, les matières et les coupes qui feront fureur...',
                'slug' => 'tendances-mode-printemps-ete',
                'author' => 'Alice Martin'
              ],
              [
                'title' => 'Comment Créer un Coin Bureau Ergonomique à la Maison',
                'image' => 'https://placehold.co/400x250/E0E7FF/1E3A8A?text=Blog+Bureau',
                'category' => 'Maison',
                'date' => '05 Avril 2024',
                'excerpt' => 'Le télétravail est devenu une norme. Apprenez à aménager un espace de travail confortable et productif chez vous avec nos astuces simples...',
                'slug' => 'creer-coin-bureau-ergonomique',
                'author' => 'Paul Lefevre'
              ],
            ];
          @endphp
          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($recentPosts as $post)
            <article class="bg-white rounded-lg shadow-lg overflow-hidden flex flex-col group">
              <a href="{{ url('/blog/' . $post['slug']) }}" class="block">
                <img src="{{ $post['image'] }}" alt="Image pour {{ $post['title'] }}" class="w-full h-56 object-cover group-hover:opacity-85 transition-opacity duration-300">
              </a>
              <div class="p-6 flex flex-col flex-grow">
                <div class="mb-3">
                  <span class="text-xs font-semibold text-blue-600 uppercase">{{ $post['category'] }}</span>
                  <span class="text-xs text-gray-500 ml-2">{{ $post['date'] }}</span>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-3 group-hover:text-blue-700 transition-colors duration-300">
                  <a href="{{ url('/blog/' . $post['slug']) }}">{{ $post['title'] }}</a>
                </h3>
                <p class="text-gray-600 text-sm leading-relaxed mb-4 flex-grow">{{ $post['excerpt'] }}</p>
                <div class="flex items-center justify-between mt-auto">
                    <a href="{{ url('/blog/' . $post['slug']) }}" class="text-sm font-semibold text-blue-600 hover:text-blue-800 transition-colors duration-300">
                        Lire la suite &rarr;
                    </a>
                    @if(isset($post['author']))
                        <p class="text-xs text-gray-500">Par {{ $post['author'] }}</p>
                    @endif
                </div>
              </div>
            </article>
            @endforeach
          </div>
          <div class="text-center mt-12">
            <a href="{{ url('/blog') }}" class="inline-block bg-blue-600 text-white font-semibold py-3 px-8 rounded-lg text-lg hover:bg-blue-700 transition duration-300 ease-in-out">
              Visiter notre Blog
            </a>
          </div>
        </div>
      </section>
      {{-- Fin Section Blog / Articles Récents --}}

      {{-- Section Newsletter --}}
      <section id="newsletter" class="py-12 md:py-16 bg-gradient-to-r from-blue-700 to-purple-700 text-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 text-center">
          <h2 class="text-3xl font-bold mb-4">Restez Informé !</h2>
          <p class="text-lg opacity-90 mb-8 max-w-2xl mx-auto">
            Abonnez-vous à notre newsletter pour recevoir nos dernières offres, nouveautés et conseils exclusifs directement dans votre boîte mail.
          </p>
          <form action="#" method="POST" class="max-w-lg mx-auto">
            {{-- @csrf --}} {{-- Décommenter si le formulaire est réellement soumis côté serveur --}}
            <div class="flex flex-col sm:flex-row gap-4">
              <label for="email-newsletter" class="sr-only">Adresse e-mail</label>
              <input
                type="email"
                name="email_newsletter"
                id="email-newsletter"
                required
                placeholder="Votre adresse e-mail"
                class="flex-grow p-3 rounded-md border border-transparent text-gray-800 focus:ring-2 focus:ring-yellow-400 focus:border-transparent outline-none"
              />
              <button
                type="submit"
                class="bg-yellow-400 text-gray-900 font-semibold py-3 px-8 rounded-md hover:bg-yellow-300 transition duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 focus:ring-offset-blue-700"
              >
                S'inscrire
              </button>
            </div>
            <p class="text-xs opacity-70 mt-4">
              En vous inscrivant, vous acceptez notre <a href="#" class="underline hover:text-yellow-300">Politique de Confidentialité</a>.
            </p>
          </form>
        </div>
      </section>
      {{-- Fin Section Newsletter --}}

      {{-- Bandeau de Réassurance --}}
      <section id="reassurance" class="py-8 md:py-12 bg-gray-100 border-t border-b border-gray-200">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
          <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 text-center">
            {{-- Élément de réassurance 1 --}}
            <div class="flex flex-col items-center">
              {{-- Icône SVG Placeholder (Camion pour livraison) --}}
              <svg class="h-10 w-10 text-blue-600 mb-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
              </svg>
              <h3 class="text-lg font-semibold text-gray-800 mb-1">Livraison Rapide</h3>
              <p class="text-sm text-gray-600">Expédition en 24/48h, offerte dès 50€ d'achat.</p>
            </div>
            {{-- Élément de réassurance 2 --}}
            <div class="flex flex-col items-center">
              {{-- Icône SVG Placeholder (Bouclier pour paiement sécurisé) --}}
              <svg class="h-10 w-10 text-blue-600 mb-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
              </svg>
              <h3 class="text-lg font-semibold text-gray-800 mb-1">Paiement Sécurisé</h3>
              <p class="text-sm text-gray-600">Transactions 100% protégées (SSL, 3D Secure).</p>
            </div>
            {{-- Élément de réassurance 3 --}}
            <div class="flex flex-col items-center">
              {{-- Icône SVG Placeholder (Boîte avec flèche retour) --}}
              <svg class="h-10 w-10 text-blue-600 mb-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10.5 18.75h3M12 11.25v5.25M4.5 7.5h15M5.25 3.75h13.5" /> {{-- Simplifié: icone paquet cadeau / boite --}}
                 <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0011.667 0l3.181-3.183m-4.991 0l-3.182-3.182a8.25 8.25 0 00-11.667 0l-3.181 3.182H2.985z" /> {{-- Flèche de retour --}}
              </svg>
              <h3 class="text-lg font-semibold text-gray-800 mb-1">Retours Faciles</h3>
              <p class="text-sm text-gray-600">Satisfait ou remboursé sous 30 jours.</p>
            </div>
            {{-- Élément de réassurance 4 --}}
            <div class="flex flex-col items-center">
              {{-- Icône SVG Placeholder (Casque audio pour service client) --}}
              <svg class="h-10 w-10 text-blue-600 mb-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.114 5.636a9 9 0 010 12.728M16.463 8.288a5.25 5.25 0 010 7.424M6.75 8.25l4.72-4.72a.75.75 0 011.28.53v15.88a.75.75 0 01-1.28.53l-4.72-4.72H4.51c-.88 0-1.704-.507-1.938-1.354A9.01 9.01 0 012.25 12c0-.83.112-1.633.322-2.396C2.806 8.756 3.63 8.25 4.51 8.25H6.75z" />
              </svg>
              <h3 class="text-lg font-semibold text-gray-800 mb-1">Service Client Expert</h3>
              <p class="text-sm text-gray-600">Notre équipe est à votre écoute 6j/7.</p>
            </div>
          </div>
        </div>
      </section>
      </section>
      {{-- Fin Bandeau de Réassurance --}}

      {{-- Pied de Page E-commerce --}}
      <footer class="bg-gray-800 text-gray-300 pt-16 pb-8">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
            {{-- Colonne 1: À Propos / Logo --}}
            <div>
              <h3 class="text-xl font-bold text-white mb-4">LOGO_SITE</h3>
              {{-- <img src="{{ asset('path/to/your/footer-logo.png') }}" alt="Logo Footer" class="h-10 mb-4"> --}}
              <p class="text-sm mb-4">
                Votre boutique en ligne de référence pour des produits de qualité, un service client exceptionnel et une expérience d'achat unique.
              </p>
              {{-- Icônes Réseaux Sociaux --}}
              <div class="flex space-x-4">
                <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300" aria-label="Facebook">
                  <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.772-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" /></svg>
                </a>
                <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300" aria-label="Instagram">
                  <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12.315 2.188a4.5 4.5 0 00-4.63 0C3.603 2.714 1.964 5.172 1.964 8.425c0 3.252 1.64 5.71 5.72 6.237.07.01.14.02.21.03v1.808a3.375 3.375 0 006.162 2.137 .75.75 0 00-.853-.354 1.875 1.875 0 01-2.452-2.198V14.69c.07-.01.14-.02.21-.03 4.08-.526 5.72-2.985 5.72-6.237 0-3.253-1.64-5.71-5.72-6.237zM12 6.75a2.25 2.25 0 100 4.5 2.25 2.25 0 000-4.5z" clip-rule="evenodd" /><path d="M14.25 5.25a.75.75 0 100-1.5.75.75 0 000 1.5z" /></svg>
                </a>
                <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300" aria-label="Twitter">
                  <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" /></svg>
                </a>
                 <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300" aria-label="LinkedIn">
                  <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M19 3A2 2 0 0 1 21 5v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14zm-.5 15.5v-5.375c0-1.55-.556-2.618-1.932-2.618-.881 0-1.463.49-1.706 1.023h-.024v-.86H12.5v8.833h2.334v-4.33A1.953 1.953 0 0 1 16.68 9.9c1.082 0 1.82.732 1.82 2.225v5.375H18.5zM6.834 8.993c0 .93.746 1.673 1.666 1.673h.024c.92 0 1.666-.743 1.666-1.673S9.444 7.32 8.524 7.32H8.5c-.92 0-1.666.743-1.666 1.673zm.166 9.507h2.334V12.5H7v5.999z" clip-rule="evenodd" /></svg>
                </a>
              </div>
            </div>

            {{-- Colonne 2: Liens Utiles --}}
            <div>
              <h4 class="text-lg font-semibold text-white mb-4">Liens Utiles</h4>
              <ul class="space-y-2 text-sm">
                <li><a href="#" class="hover:text-yellow-400 transition-colors duration-300">À Propos de Nous</a></li>
                <li><a href="#" class="hover:text-yellow-400 transition-colors duration-300">FAQ</a></li>
                <li><a href="#" class="hover:text-yellow-400 transition-colors duration-300">Politique de Livraison</a></li>
                <li><a href="#" class="hover:text-yellow-400 transition-colors duration-300">Politique de Retour</a></li>
                <li><a href="#" class="hover:text-yellow-400 transition-colors duration-300">Suivi de Commande</a></li>
              </ul>
            </div>

            {{-- Colonne 3: Catégories --}}
            <div>
              <h4 class="text-lg font-semibold text-white mb-4">Catégories</h4>
              <ul class="space-y-2 text-sm">
                <li><a href="#" class="hover:text-yellow-400 transition-colors duration-300">Électronique</a></li>
                <li><a href="#" class="hover:text-yellow-400 transition-colors duration-300">Mode & Vêtements</a></li>
                <li><a href="#" class="hover:text-yellow-400 transition-colors duration-300">Maison & Jardin</a></li>
                <li><a href="#" class="hover:text-yellow-400 transition-colors duration-300">Beauté & Santé</a></li>
                <li><a href="#" class="hover:text-yellow-400 transition-colors duration-300">Sports & Loisirs</a></li>
              </ul>
            </div>

            {{-- Colonne 4: Contact --}}
            <div>
              <h4 class="text-lg font-semibold text-white mb-4">Contactez-Nous</h4>
              <address class="text-sm not-italic space-y-2">
                <p>123 Rue de l'Exemple, 75000 Paris, France</p>
                <p>Email: <a href="mailto:contact@votresite.com" class="hover:text-yellow-400 transition-colors duration-300">contact@votresite.com</a></p>
                <p>Téléphone: <a href="tel:+33123456789" class="hover:text-yellow-400 transition-colors duration-300">+33 1 23 45 67 89</a></p>
              </address>
              {{-- Moyens de paiement acceptés (icônes) --}}
              <div class="mt-6">
                <h5 class="text-md font-semibold text-white mb-2">Paiements Acceptés</h5>
                <div class="flex space-x-2">
                  {{-- Placeholder pour icônes de paiement (ex: Visa, Mastercard, PayPal) --}}
                  <span class="text-xs bg-gray-700 px-2 py-1 rounded">VISA</span>
                  <span class="text-xs bg-gray-700 px-2 py-1 rounded">MasterCard</span>
                  <span class="text-xs bg-gray-700 px-2 py-1 rounded">PayPal</span>
                </div>
              </div>
            </div>
          </div>

          {{-- Ligne de séparation --}}
          <div class="border-t border-gray-700 pt-8">
            <div class="flex flex-col md:flex-row justify-between items-center text-sm">
              <p>&copy; {{ date('Y') }} LOGO_SITE. Tous droits réservés.</p>
              <ul class="flex space-x-4 mt-4 md:mt-0">
                <li><a href="#" class="hover:text-yellow-400 transition-colors duration-300">Mentions Légales</a></li>
                <li><a href="#" class="hover:text-yellow-400 transition-colors duration-300">CGV</a></li>
                <li><a href="#" class="hover:text-yellow-400 transition-colors duration-300">Politique de Confidentialité</a></li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
      {{-- Fin Pied de Page E-commerce --}}

      {{-- Le contenu restant de la page (s'il y en avait) serait ici --}}
      {{-- J'ai retiré le div placeholder qui occupait min-h-screen pour que le footer soit visible --}}
    </main>

  </div>

@endsection

{{-- Section pour les scripts spécifiques à cette page (si nécessaire) --}}
@push('scripts')
<script>
  // Gestion du menu mobile
  const mobileMenuButton = document.getElementById('mobile-menu-button');
  const mobileMenu = document.getElementById('mobile-menu');
  const menuIconOpen = mobileMenuButton.querySelector('svg.block'); // Hamburger
  const menuIconClose = mobileMenuButton.querySelector('svg.hidden'); // X

  mobileMenuButton.addEventListener('click', () => {
    const expanded = mobileMenuButton.getAttribute('aria-expanded') === 'true' || false;
    mobileMenuButton.setAttribute('aria-expanded', !expanded);
    mobileMenu.classList.toggle('hidden');
    menuIconOpen.classList.toggle('hidden');
    menuIconClose.classList.toggle('hidden');
  });

  // Gestion du sous-menu mobile pour les catégories
  function toggleMobileSubmenu(button) {
    const submenu = button.nextElementSibling;
    const isExpanded = submenu.classList.contains('hidden');
    // Cacher tous les autres sous-menus ouverts pour éviter confusion
    document.querySelectorAll('#mobile-menu .pl-4').forEach(sm => {
        if (sm !== submenu) {
            sm.classList.add('hidden');
            // Réinitialiser l'icône des autres boutons de sous-menu
            const otherButton = sm.previousElementSibling;
            const otherSvg = otherButton.querySelector('svg');
            if (otherSvg) otherSvg.classList.remove('rotate-180');

        }
    });

    submenu.classList.toggle('hidden');
    const svgIcon = button.querySelector('svg');
    if (svgIcon) {
        svgIcon.classList.toggle('rotate-180', !isExpanded); // Ajoute rotate-180 si le sous-menu EST maintenant visible
    }
  }
</script>
@endpush
