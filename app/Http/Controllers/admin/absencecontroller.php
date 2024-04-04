<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\absence;
use App\Models\matiere;
use Illuminate\Support\Facades\Auth;

class absencecontroller extends Controller
{
    
    public function index()
    {   
        $etudiant=Auth::user()->userable;
        $getMatieres= matiere::getMatieres();
        $data = absence::with(['etudiant', 'matiere'])->where('ID_Etudiant', $etudiant->ID_Etudiant)
                           ->where('present', 0)
                           ->get();
        return view('etudiant.absence', compact('data'));
    }
    public function affiche(){
    $absence =absence::with(['etudiant', 'matiere'])->where('present', 0)->get();
    return view('admin.absenceadmin', compact('absence'));
    }
     public function destroy($id)
     {
         $absence = absence::findOrFail($id);
    
         $absence->delete();
    
         return redirect()->route('absence.affiche');
     }
 
}


