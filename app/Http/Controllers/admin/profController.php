<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Models\prof;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\matiere;
use App\Models\niveau;
class profController extends Controller
{
    public function index()
    {
        $data['getreco']= prof::getreco();
        $data['getniveau']= niveau::getniveau();
        $data['getMatieres']= matiere::getMatieres();
        return view('admin.enseignantadmin', $data);
    }
    public function store (Request $request ){
        $prof = new prof;
        $prof->nom = $request->nom;
        $prof->prenom = $request->prenom;
        $prof->email = $request->email;
        $prof->password = bcrypt($request->password);
        $prof->date_inscription = $request->date_inscription;
        $prof->niveau = $request->niveau;
        $prof->salaire = $request->salaire;
        $prof->tele = $request->tele;
        $prof->ID_Matiere = $request->ID_Matiere;
        $prof->save();

    $user = new User;
    $user->email = $request->email;
    $user->password = bcrypt($request->password);
    $user->type = 'prof'; 
    $user->userable_type = 'App\Models\prof';
    $user->userable_id = $prof->ID_Prof;
    $user->save();

    return redirect()->route('profs.index');

    }



    public function update(Request $request)
    {
        if ($request->ajax()) {
            $prof = prof::find($request->pk);
            if ($prof) {
                $column = $request->column;
                if ($column && in_array($column, $prof->getFillable())) {
                    $prof->update([$column => $request->value]);
                    if ($prof->user) {
                        $prof->user->update([$column => $request->value]);
                    }
                    return response()->json(['success' => true]);
                }
                return response()->json(['error' => 'Invalid column'], 400);
            }
            return response()->json(['error' => 'prof not found'], 404);
        }
        return response()->json(['error' => 'Invalid request'], 400);
    }
    

    public function destroy($id)
    {
        $prof = prof::findOrFail($id);
    
        // Delete associated user
        if ($prof->user) {
            $prof->user->delete();
        }
    
        // Delete admin
        $prof->delete();
    
        return redirect()->route('profs.index');
    }
}
