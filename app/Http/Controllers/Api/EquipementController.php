<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Equipement;

class EquipementController extends Controller
{
    /**
     * Search equipment by designation, model, brand, category, or reference
     */
    public function search(Request $request)
    {
        $query = $request->query('q');

        if (!$query) {
            return response()->json([
                'message' => 'Query parameter "q" is required'
            ], 400);
        }

        $equipements = Equipement::with(['marque', 'categorie', 'photos'])
            ->where(function ($q) use ($query) {
                $q->where('designation', 'like', "%{$query}%")
                  ->orWhere('modele', 'like', "%{$query}%")
                  ->orWhere('reference', 'like', "%{$query}%")
                  ->orWhereHas('marque', function ($q2) use ($query) {
                      $q2->where('name', 'like', "%{$query}%");
                  })
                  ->orWhereHas('categorie', function ($q2) use ($query) {
                      $q2->where('name', 'like', "%{$query}%");
                  });
            })
            ->get();

        return response()->json(
            $this->formatEquipements($equipements)
        );
    }

    /**
     * Total equipments
     */
    public function total()
    {
        return response()->json([
            'total_equipements' => Equipement::count()
        ]);
    }

    /**
     * List all equipments
     */
    public function index()
    {
        $equipements = Equipement::with(['marque', 'categorie', 'photos'])->get();

        return response()->json(
            $this->formatEquipements($equipements)
        );
    }

    /**
     * Format data for Flutter
     */
    private function formatEquipements($equipements)
    {
        return $equipements->map(function ($eq) {
            return [
                'id' => $eq->id,
                'designation' => $eq->designation,
                'modele' => $eq->modele,
                'reference' => $eq->reference ?? null,
                'statut' => $eq->statut ?? null,

                'marque' => $eq->marque?->name,
                'categorie' => $eq->categorie?->name,

                // Certificate URL
                'certificat' => $eq->certificat
                    ? url("media/certificats/{$eq->certificat}")
                    : null,

                // Photos URLs
                'photos' => $eq->photos->map(function ($photo) {
                    // Ensure URL points to public/media/equipements folder
                    return [
                        'id' => $photo->id,
                        'url' => url("media/equipements/{$photo->url}"),
                    ];
                }),

                'demandeur_id' => $eq->demandeur_id,
                'created_at' => $eq->created_at?->toDateTimeString(),
            ];
        });
    }
}
