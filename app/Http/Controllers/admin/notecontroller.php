<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\note;
use App\Models\matiere;
use Illuminate\Support\Facades\Auth;

class notecontroller extends Controller
{
    
    public function index()
    {
        $etudiant=Auth::user()->userable;
        $getMatieres= matiere::getMatieres();
        $notesc = Note::where('ID_Etudiant', $etudiant->ID_Etudiant)->get();
        return view('etudiant.examresultat', compact('notesc','getMatieres'));
    }
   
}
