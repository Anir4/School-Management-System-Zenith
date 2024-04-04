<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\niveau;

use Illuminate\Http\Request;

class niveaucontroller extends Controller
{
    public function index()
    {
        $niveaux = niveau::all();
        
        return view('admin.niveauadmin', compact('niveaux'));
    } 
    public function store (Request $request ){
        $niveau = new niveau;
        $niveau->nom = $request->nom;
        $niveau->save();

    return redirect()->route('niveaux.index');

    }



    public function update(Request $request)
    {
        if ($request->ajax()) {
            $niveau = niveau::find($request->pk);
            if ($niveau) {
                $column = $request->column;
                if ($column && in_array($column, $niveau->getFillable())) {
                    $niveau->update([$column => $request->value]);
                    return response()->json(['success' => true]);
                }
                return response()->json(['error' => 'Invalid column'], 400);
            }
            return response()->json(['error' => 'niveau not found'], 404);
        }
        return response()->json(['error' => 'Invalid request'], 400);
    }
    

    public function destroy($id)
    {
        $niveau = niveau::findOrFail($id);
    
        $niveau->delete();
    
        return redirect()->route('niveaux.index');
    }
}
