<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Dossier;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class ClientDossierController extends Controller
{
    /**
     * Store a client and their dossiers.
     */
public function store(Request $request)
{
    try {
        $request->validate([
            'client_name' => 'required|string|max:255',
            'client_email' => 'required|email|max:255',
            'client_phone' => 'required|string|max:50',
            'client_adresse' => 'required|string|max:255',
            'dossiers' => 'required|array|min:1',
            'dossiers.*.marque' => 'required|string|max:255',
            'dossiers.*.modele' => 'required|string|max:255',
            'dossiers.*.description' => 'required|string',
            'dossiers.*.quantity' => 'required|integer|min:0',
            'dossiers.*.photo1' => 'required|file|image|max:10240',
            'dossiers.*.photo2' => 'required|file|image|max:10240',
        ]);

        // ✅ Create or get existing client by email
        $client = Client::updateOrCreate(
            ['email' => $request->client_email],
            [
                'name' => $request->client_name,
                'phone' => $request->client_phone,
                'adresse' => $request->client_adresse,
            ]
        );

        $agent = $request->user(); // Currently logged-in agent

        $dossiersResponse = [];

        // Ensure directory exists
        $dir = public_path('media/dossiers');
        if (!File::exists($dir)) {
            File::makeDirectory($dir, 0755, true);
        }

        // Save multiple dossiers
        foreach ($request->dossiers as $i => $d) {
            $dossier = new Dossier();
            $dossier->client_id = $client->id;
            $dossier->agent_id = $agent?->id; // Save only agent ID
            $dossier->marque = $d['marque'];
            $dossier->modele = $d['modele'];
            $dossier->description = $d['description'];
            $dossier->quantity = $d['quantity'];

            // Save photos
            if ($request->hasFile("dossiers.$i.photo1")) {
                $file1 = $request->file("dossiers.$i.photo1");
                $filename1 = Str::random(20) . '.' . $file1->getClientOriginalExtension();
                $file1->move($dir, $filename1);
                $dossier->photo1 = $filename1;
            }

            if ($request->hasFile("dossiers.$i.photo2")) {
                $file2 = $request->file("dossiers.$i.photo2");
                $filename2 = Str::random(20) . '.' . $file2->getClientOriginalExtension();
                $file2->move($dir, $filename2);
                $dossier->photo2 = $filename2;
            }

            $dossier->save();

            $dossiersResponse[] = [
                'id' => $dossier->id,
                'marque' => $dossier->marque,
                'modele' => $dossier->modele,
                'description' => $dossier->description,
                'quantity' => $dossier->quantity,
                'photo1' => $dossier->photo1 ? url('media/dossiers/' . $dossier->photo1) : null,
                'photo2' => $dossier->photo2 ? url('media/dossiers/' . $dossier->photo2) : null,
            ];
        }

        return response()->json([
            'message' => 'Client and dossiers saved successfully',
            'client' => $client,
            'dossiers' => $dossiersResponse,
        ], 201);
    } catch (\Exception $e) {
        return response()->json([
            'error' => 'Failed to store client and dossiers',
            'message' => $e->getMessage(),
        ], 500);
    }
}


    /**
     * TOTAL DOSSIERS COUNT
     */
    public function totalDossiers()
    {
        return response()->json([
            'total_dossiers' => Dossier::count()
        ]);
    }

    /**
     * TOTAL AGENTS COUNT (Spatie roles)
     */
    public function totalAgents()
    {
        try {
            $count = User::role('AGENT')->count();

            return response()->json([
                'total_agents' => $count
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to count agents',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Get all dossiers
     */
public function index()
{
    $dossiers = Dossier::with(['client', 'agent'])->orderBy('created_at', 'desc')->get();

    return response()->json([
        'dossiers' => $dossiers->map(function ($dossier) {

            $agent = $dossier->agent;

            return [
                'id' => $dossier->id,
                'marque' => $dossier->marque,
                'modele' => $dossier->modele,
                'description' => $dossier->description,
                'quantity' => $dossier->quantity,
                'photo1' => $dossier->photo1 ? url('media/dossiers/'.$dossier->photo1) : null,
                'photo2' => $dossier->photo2 ? url('media/dossiers/'.$dossier->photo2) : null,

                'client' => [
                    'name' => $dossier->client->name,
                    'email' => $dossier->client->email,
                    'phone' => $dossier->client->phone,
                    'adresse' => $dossier->client->adresse,
                ],

                // ✅ SAFE AGENT BLOCK
                'agent' => $agent ? [
                    'id' => $agent->id,
                    'name' => trim($agent->first_name.' '.$agent->last_name),
                    'phone' => $agent->phone,
                    'email' => $agent->email,
                ] : null,
            ];
        }),
    ]);
}

}
