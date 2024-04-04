<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\etudiant;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\classe;
use App\Models\niveau;
class etudiantcontroller extends Controller
{
    public function index()
    {
        $data['getreco']= etudiant::getreco();
        $data['getniveau']= niveau::getniveau();
        $data['getclasse']= classe::getclasse();
        return view('admin.etudiantadmin', $data);
    }
    public function store (Request $request ){
      
       $etudiant = new etudiant;
        $etudiant->nom = $request->nom;
        $etudiant->prenom = $request->prenom;
        $etudiant->email = $request->email;
        $etudiant->date_naissance = $request->date_naissance;
        $etudiant->password = bcrypt($request->password);
        $etudiant->date_inscription = $request->date_inscription;
        $etudiant->ID_Niveau = $request->ID_Niveau;
        $etudiant->ID_Class = $request->ID_Class;
        $etudiant->tele = $request->tele;
        $etudiant->filiere = $request->filiere;
        $etudiant->save();

    $user = new User;
    $user->email = $request->email;
    $user->password = bcrypt($request->password);
    $user->type = 'etudiant'; 
    $user->userable_type = 'App\Models\etudiant';
    $user->userable_id = $etudiant->ID_Etudiant;
    $user->save();
    return redirect()->route('etudiants.index');

    }



    public function update(Request $request)
    {
        if ($request->ajax()) {
            $etudiant = etudiant::find($request->pk);
            if ($etudiant) {
                $column = $request->column;
                if ($column && in_array($column, $etudiant->getFillable())) {
                    $etudiant->update([$column => $request->value]);
                    if ($etudiant->user) {
                        $etudiant->user->update([$column => $request->value]);
                    }
                    return response()->json(['success' => true]);
                }
                return response()->json(['error' => 'Invalid column'], 400);
            }
            return response()->json(['error' => 'etudiant not found'], 404);
        }
        return response()->json(['error' => 'Invalid request'], 400);
    }
    

    public function destroy($id)
    {
        $prof = etudiant::findOrFail($id);
    
        // Delete associated user
        if ($prof->user) {
            $prof->user->delete();
        }
    
        // Delete admin
        $prof->delete();
    
        return redirect()->route('etudiants.index');
    }
}
