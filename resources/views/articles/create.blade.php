@extends('layouts.app')

{{-- Section pour le titre de la page --}}
@section('title', 'Créer un Nouvel Article')

{{-- Section pour le contenu principal de la page --}}
@section('contenus')

{{-- En-tête de la page avec titre et fil d'Ariane --}}
<div class="page-header">
    <h3 class="fw-bold mb-3">Gestion des Articles</h3>
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
            <a href="{{ route('articles.index') }}">Articles</a>
        </li>
        <li class="separator">
            <i class="icon-arrow-right"></i>
        </li>
        <li class="nav-item">
            <a href="#">Créer un Article</a>
        </li>
    </ul>
</div>

{{-- Conteneur principal pour le formulaire de création d'article --}}
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Formulaire d'Ajout d'Article</h4>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nom de l'article</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

<<<<<<< HEAD
=======
                    {{-- Champ Slug --}}
                    <div class="form-group">
                        <label for="slug">Slug (URL)</label>
                        <input type="text" name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror"
                               value="{{ old('slug') }}" placeholder="laisser-vide-pour-generation-auto">
                        @error('slug')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="form-text text-muted">Sera généré à partir du nom si laissé vide. Doit être unique.</small>
                    </div>

                    {{-- Champ Description --}}
>>>>>>> 382f1d1b418cf33b737731516d6ac9d3619e260b
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{ old('description') }}</textarea>
                        @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

<<<<<<< HEAD
=======
                    {{-- Champ SKU (Code Article) --}}
                    <div class="form-group">
                        <label for="sku">SKU (Code Article)</label>
                        <input type="text" name="sku" id="sku" class="form-control @error('sku') is-invalid @enderror"
                               value="{{ old('sku') }}" placeholder="Ex: ARTICLE001">
                        @error('sku')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="form-text text-muted">Code unique pour la gestion de stock.</small>
                    </div>

                    {{-- Champ Image Principale (URL) --}}
                    <div class="form-group">
                        <label for="image_principale">URL de l'Image Principale</label>
                        <input type="text" name="image_principale" id="image_principale" class="form-control @error('image_principale') is-invalid @enderror"
                               value="{{ old('image_principale') }}" placeholder="https://exemple.com/image.jpg">
                        @error('image_principale')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Ligne pour les champs Prix et Quantité --}}
>>>>>>> 382f1d1b418cf33b737731516d6ac9d3619e260b
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="prix">Prix (FCFA)</label>
                                <input type="number" step="any" class="form-control @error('prix') is-invalid @enderror" id="prix" name="prix" value="{{ old('prix') }}" required>
                                @error('prix') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="quantite">Quantité en Stock</label>
                                <input type="number" class="form-control @error('quantite') is-invalid @enderror" id="quantite" name="quantite" value="{{ old('quantite', 0) }}" required>
                                @error('quantite') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>

<<<<<<< HEAD
=======
                    {{-- Champ Prix Promotionnel --}}
                    <div class="form-group">
                        <label for="prix_promotionnel">Prix Promotionnel (FCFA)</label>
                        <input type="number" step="0.01" min="0" name="prix_promotionnel" id="prix_promotionnel"
                               class="form-control @error('prix_promotionnel') is-invalid @enderror" value="{{ old('prix_promotionnel') }}" placeholder="Optionnel">
                        @error('prix_promotionnel')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="form-text text-muted">Laissez vide s'il n'y a pas de promotion. Doit être inférieur au prix normal.</small>
                    </div>

                    {{-- Ligne pour les champs Statut et Poids --}}
                    <div class="row">
                        <div class="col-md-6">
                            {{-- Champ Statut --}}
                            <div class="form-group">
                                <label for="statut">Statut <span class="text-danger">*</span></label>
                                <select name="statut" id="statut" class="form-select @error('statut') is-invalid @enderror" required>
                                    <option value="disponible" {{ old('statut', 'disponible') == 'disponible' ? 'selected' : '' }}>Disponible</option>
                                    <option value="brouillon" {{ old('statut') == 'brouillon' ? 'selected' : '' }}>Brouillon</option>
                                    <option value="archivé" {{ old('statut') == 'archivé' ? 'selected' : '' }}>Archivé</option>
                                    <option value="en_rupture_de_stock" {{ old('statut') == 'en_rupture_de_stock' ? 'selected' : '' }}>En rupture de stock</option>
                                </select>
                                @error('statut')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            {{-- Champ Poids --}}
                            <div class="form-group">
                                <label for="poids">Poids (kg)</label>
                                <input type="number" step="0.001" min="0" name="poids" id="poids"
                                       class="form-control @error('poids') is-invalid @enderror" value="{{ old('poids') }}" placeholder="0.000">
                                @error('poids')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="form-text text-muted">Poids en kilogrammes (ex: 0.5 pour 500g).</small>
                            </div>
                        </div>
                    </div>

                    {{-- Champ Catégorie --}}
>>>>>>> 382f1d1b418cf33b737731516d6ac9d3619e260b
                    <div class="form-group">
                        <label for="categorie_id">Catégorie</label>
                        <select class="form-control @error('categorie_id') is-invalid @enderror" id="categorie_id" name="categorie_id">
                            <option value="">Sélectionner une catégorie</option>
                            @foreach($categories as $categorie) {{-- Assuming $categories is passed from controller --}}
                                <option value="{{ $categorie->id }}" {{ old('categorie_id') == $categorie->id ? 'selected' : '' }}>{{ $categorie->nom }}</option> {{-- Assuming 'nom' for categorie name --}}
                            @endforeach
                        </select>
                        @error('categorie_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-group">
                        <label for="fournisseur_id">Fournisseur</label>
                        <select class="form-control @error('fournisseur_id') is-invalid @enderror" id="fournisseur_id" name="fournisseur_id">
                            <option value="">Sélectionner un fournisseur</option>
                            @foreach($fournisseurs as $fournisseur) {{-- Assuming $fournisseurs is passed from controller --}}
                                <option value="{{ $fournisseur->id }}" {{ old('fournisseur_id') == $fournisseur->id ? 'selected' : '' }}>{{ $fournisseur->nom }}</option> {{-- Assuming 'nom' for fournisseur name --}}
                            @endforeach
                        </select>
                        @error('fournisseur_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-group">
                        <label for="emplacement_id">Emplacement</label>
                        <select class="form-control @error('emplacement_id') is-invalid @enderror" id="emplacement_id" name="emplacement_id">
                            <option value="">Sélectionner un emplacement</option>
                            @foreach($emplacements as $emplacement) {{-- Assuming $emplacements is passed from controller --}}
                                <option value="{{ $emplacement->id }}" {{ old('emplacement_id') == $emplacement->id ? 'selected' : '' }}>{{ $emplacement->nom }}</option> {{-- Assuming 'nom' for emplacement name --}}
                            @endforeach
                        </select>
                        @error('emplacement_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

<<<<<<< HEAD
                    <div class="form-group">
                        <label for="image_path">Image de l'article</label>
                        <input type="file" class="form-control-file @error('image_path') is-invalid @enderror" id="image_path" name="image_path"> {{-- Consider using form-control for consistency if Kaiadmin styles form-control-file differently --}}
                        @error('image_path') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                    </div>

                    <div class="card-action">
                        <button type="submit" class="btn btn-success">Enregistrer</button>
                        <a href="{{ route('articles.index') }}" class="btn btn-danger">Annuler</a>
=======
                    {{-- Champ Est Visible --}}
                    <div class="form-group form-check">
                        <input type="hidden" name="est_visible" value="0"> {{-- Valeur par défaut si la case n'est pas cochée --}}
                        <input type="checkbox" name="est_visible" id="est_visible" class="form-check-input @error('est_visible') is-invalid @enderror"
                               value="1" {{ old('est_visible', true) ? 'checked' : '' }}>
                        <label class="form-check-label" for="est_visible">Visible sur le site public</label>
                        @error('est_visible')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>


                    {{-- Section des actions du formulaire --}}
                    <div class="card-action text-end">
                        {{-- Bouton Enregistrer --}}
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-save"></i> Enregistrer l'Article
                        </button>
                        {{-- Bouton Annuler/Retour --}}
                        <a href="{{ route('articles.index') }}" class="btn btn-danger">
                            <i class="fas fa-times"></i> Annuler
                        </a>
>>>>>>> 382f1d1b418cf33b737731516d6ac9d3619e260b
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- Section pour les scripts JavaScript spécifiques à cette page --}}
@push('scripts')
<script>
    // Ce script est pour la validation Bootstrap, mais il est déjà géré globalement dans layouts.app.blade.php
    // Aucun script supplémentaire n'est nécessaire ici pour la validation de base.
    // Si vous souhaitez ajouter des fonctionnalités JavaScript spécifiques à ce formulaire (ex: Select2),
    // vous pouvez les ajouter ici.

    // Exemple: Initialiser Select2 pour les listes déroulantes si KaiAdmin l'utilise ou si vous l'ajoutez
    // $(document).ready(function() {
    //     $('#category_id, #fournisseur_id, #emplacement_id').select2({
    //         theme: 'bootstrap-5' // ou le thème approprié pour KaiAdmin
    //     });
    // });
</script>
@endpush
