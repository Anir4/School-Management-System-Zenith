<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\frais;
use App\Models\etudiant;

use Illuminate\Http\Request;

class fraiscontroller extends Controller
{
    public function index()
    {
        $frai = frais::with(['etudiant'])
        ->get();
        return view('admin.fraisadmin', compact('frai'));
    } 
    public function store (Request $request ){ 
        $etudiant = etudiant::where('nom', $request->nom)
                        ->where('prenom', $request->prenom)
                        ->first();
if(!$etudiant) {
    return redirect()->back()->with('error', 'Étudiant non trouvé');
 }
     $frais = new frais;
     $frais->ID_Etudiant = $etudiant->ID_Etudiant;
     $frais->montant= $request->montant ;
     $frais->payement = $request->payement;
     $frais->reste = $request->reste;
     $frais->save();

     return redirect()->route('frai.index');

     }



    public function update(Request $request)
    {
        if ($request->ajax()) {
            $frais = frais::find($request->pk);
            if ($frais) {
                $column = $request->column;
                if ($column && in_array($column, $frais->getFillable())) {
                    $frais->update([$column => $request->value]);
                    return response()->json(['success' => true]);
                }
                return response()->json(['error' => 'Invalid column'], 400);
            }
            return response()->json(['error' => 'frais not found'], 404);
        }
        return response()->json(['error' => 'Invalid request'], 400);
    }
    

    public function destroy($id)
    {
        $frais = frais::findOrFail($id);
    
        $frais->delete();
    
        return redirect()->route('frai.index');
    }
}
