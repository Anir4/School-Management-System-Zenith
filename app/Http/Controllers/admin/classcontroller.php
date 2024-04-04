<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\classe;
use App\Models\niveau;
use App\Models\matiere;
use Illuminate\Http\Request;

class classcontroller extends Controller
{
    public function index()
    {
        $data['getClass']= classe::getClass();
        $data['getniveau']= niveau::getniveau();
        $data['getMatieres']= matiere::getMatieres();
        return view('admin.classadmin', $data);
    } 
    public function store (Request $request ){
        $classe = new classe;
        $classe->nom = $request->nom;
        $classe->filiere = $request->filiere;
        $classe->niveau = $request->niveau;
        $classe->save();

    return redirect()->route('classp.index');

    }



    public function update(Request $request)
    {
        if ($request->ajax()) {
            $classe = classe::find($request->pk);
            if ($classe) {
                $column = $request->column;
                if ($column && in_array($column, $classe->getFillable())) {
                    $classe->update([$column => $request->value]);
                    return response()->json(['success' => true]);
                }
                return response()->json(['error' => 'Invalid column'], 400);
            }
            return response()->json(['error' => 'classe not found'], 404);
        }
        return response()->json(['error' => 'Invalid request'], 400);
    }
    

    public function destroy($id)
    {
        $classe = classe::findOrFail($id);
    
        $classe->delete();
    
        return redirect()->route('classp.index');
    }
}
