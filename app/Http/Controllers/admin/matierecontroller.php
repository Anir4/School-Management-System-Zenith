<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\matiere;
use Illuminate\Http\Request;

class matierecontroller extends Controller
{
    public function index()
    {
        $matieres = matiere::all();
        
        return view('admin.matiereadmin', compact('matieres'));
    } 
    public function store (Request $request ){
        $matiere = new matiere;
        $matiere->nom = $request->nom;
        $matiere->save();

    return redirect()->route('matieres.index');

    }



    public function update(Request $request)
    {
        if ($request->ajax()) {
            $matiere = matiere::find($request->pk);
            if ($matiere) {
                $column = $request->column;
                if ($column && in_array($column, $matiere->getFillable())) {
                    $matiere->update([$column => $request->value]);
                    return response()->json(['success' => true]);
                }
                return response()->json(['error' => 'Invalid column'], 400);
            }
            return response()->json(['error' => 'matiere not found'], 404);
        }
        return response()->json(['error' => 'Invalid request'], 400);
    }
    

    public function destroy($id)
    {
        $matiere = matiere::findOrFail($id);
    
        $matiere->delete();
    
        return redirect()->route('matieres.index');
    }
}
