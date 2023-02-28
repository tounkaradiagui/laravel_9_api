<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Etudiant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EtudiantController extends Controller
{
    public function index()
    {
        $etudiants = Etudiant::all();

        if($etudiants->count() > 0)
        {
            return response()->json([
                'status' => 200,
                'message' => $etudiants
            ], 200);
        }
        else
        {
            return response()->json([
                'status' => 404,
                'message' => 'Aucun étudiant disponible'
            ], 404);
        }
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'nom' => 'required|string|max:200',
            'prenom' => 'required|string|max:200',
            'cours' => 'required|string|max:200',
            'email' => 'required|email|max:200',
            'telephone' => 'required|digits:8'
        ]);

        if($validate->fails())
        {
            return response()->json([
                'status' => 422,
                'errors' => $validate->messages()
            ],422);
        }
        else
        {
            $etudiants = Etudiant::create([
                'nom'=> $request->nom,
                'prenom'=> $request->prenom,
                'cours'=> $request->cours,
                'email'=> $request->email,
                'telephone'=> $request->telephone
            ]);

            if($etudiants){
                return response()->json([
                    'status' => 200,
                    'message' => 'Etudiant ajouté avec succès'
                ],200);
            }
            else
            {
                return response()->json([
                    'status' => 500,
                    'message' => 'Erreur de création de, Veuillez réessayer !'
                ],500);
            }
        }

    }

    public function show($id)
    {
        $etudiant = Etudiant::find($id);
        if($etudiant)
        {
            return response()->json([
                'status' => 200,
                'message' => $etudiant
            ],200);
        }
        else
        {
            return response()->json([
                'status' => 404,
                'message' => 'Aucun étudiant disponible'
            ],404);
        }
    }

    public function edit($id)
    {
        $etudiant = Etudiant::find($id);
        if($etudiant){
            return response()->json([
                'status' => 200,
                'message' => $etudiant
            ],200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'Aucun étudiant disponible'
            ], 404);
        }
    }

    public function update(Request $request, int $id)
    {
        $validate = Validator::make($request->all(), [
            'nom' => 'required|string|max:200',
            'prenom' => 'required|string|max:200',
            'cours' => 'required|string|max:200',
            'email' => 'required|email|max:200',
            'telephone' => 'required|digits:8'
        ]);

        if($validate->fails())
        {
            return response()->json([
                'status' => 422,
                'message' => $validate->messages()
            ],422);
        }
        else
        {
            $etudiants = Etudiant::find($id);

            if($etudiants){

                $etudiants->update([
                    'nom'=> $request->nom,
                    'prenom'=> $request->prenom,
                    'cours'=> $request->cours,
                    'email'=> $request->email,
                    'telephone'=> $request->telephone
                ]);

                return response()->json([
                    'status' => 200,
                    'message' => 'Infos mise à jour avec succès'
                ],200);
            }
            else
            {
                return response()->json([
                    'status' => 404,
                    'message' => 'Erreur de modificaton, Veuillez réessayer !'
                ],404);
            }
        }

    }

    public function destroy($id)
    {
        $etudiants = Etudiant::find($id);

        if($etudiants)
        {
            $etudiants->delete();

            return response()->json([
                'status' => 200,
                'message' => 'Suppression réussie'
            ],200);
        }
        else
        {
            return response()->json([
                'status' => 404,
                'message' => 'Erreur de suppression, Veuillez réessayer !'
            ],404);
        }

    }


}
