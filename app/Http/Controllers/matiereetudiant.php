<?php

namespace App\Http\Controllers;
use App\Models\class_matiere;
use Illuminate\Support\Facades\Auth;
use App\Models\matiere;
use App\Models\DevoiresEtudiante;
use App\Models\Ressources;

use Illuminate\Http\Request;

class matiereetudiant extends Controller
{

    public function uploadResponse(Request $request)
{
    if ($request->hasFile('file')) {
        $file = $request->file('file');
        $filename = $file->getClientOriginalName();
        $filePath = $file->storeAs('uploads', $filename); // Adjust the storage path as needed
        
        DevoiresEtudiante::create([
            'ID_Etudiant' => $request->etudiantId,
            'ID_Ressources' => $request->resourceId,
            'titre'=> $filename,
            'status' => 'not_confirmed', // Set the initial status
            'pdf_url' => $filePath, // Save the file path
        ]);

        return response()->json(['success' => true, 'message' => 'File uploaded successfully.']);
    } else {
        return response()->json(['success' => false, 'message' => 'File not found.']);
    }
}



    public function getStudentCours(Request $request)
    {
        $type=$request->type;
        $idclass = $request->id_class;
        $resources = Ressources::where('ID_Class', $idclass)->where('type',$type)->get(); 
        return response()->json($resources);
    }

    public function showmatiereetudiant() {
        $etudiant=Auth::user()->userable;
        $classMatiereIds = class_matiere::where('ID_Class', $etudiant->ID_Class)->pluck('ID_Matiere');
        $classMatieres = matiere::whereIn('ID_Matiere', $classMatiereIds)->get();
        return view('etudiant.cours', compact('etudiant','classMatieres'));
    }
    public function showmatiereetudiantdevoir() {
        $etudiant=Auth::user()->userable;
        $classMatiereIds = class_matiere::where('ID_Class', $etudiant->ID_Class)->pluck('ID_Matiere');
        $classMatieres = matiere::whereIn('ID_Matiere', $classMatiereIds)->get();
        return view('etudiant.devoir', compact('etudiant','classMatieres'));
    }
}
