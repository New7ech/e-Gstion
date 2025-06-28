<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'prix' => 'required|numeric|min:0',
            'quantite' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'fournisseur_id' => 'required|exists:fournisseurs,id',
            'emplacement_id' => 'required|exists:emplacements,id',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'name.required' => "Le nom de l'article est obligatoire.",
            'name.string' => "Le nom de l'article doit être une chaîne de caractères.",
            'name.max' => "Le nom de l'article ne doit pas dépasser 255 caractères.",
            'description.string' => "La description de l'article doit être une chaîne de caractères.",
            'prix.required' => "Le prix de l'article est obligatoire.",
            'prix.numeric' => "Le prix de l'article doit être un nombre.",
            'prix.min' => "Le prix de l'article ne peut pas être négatif.",
            'quantite.required' => "La quantité de l'article est obligatoire.",
            'quantite.integer' => "La quantité de l'article doit être un nombre entier.",
            'quantite.min' => "La quantité de l'article ne peut pas être négative.",
            'category_id.required' => "La catégorie est obligatoire.",
            'category_id.exists' => "La catégorie sélectionnée n'est pas valide.",
            'fournisseur_id.required' => "Le fournisseur est obligatoire.",
            'fournisseur_id.exists' => "Le fournisseur sélectionné n'est pas valide.",
            'emplacement_id.required' => "L'emplacement est obligatoire.",
            'emplacement_id.exists' => "L'emplacement sélectionné n'est pas valide.",
        ];
    }
}
