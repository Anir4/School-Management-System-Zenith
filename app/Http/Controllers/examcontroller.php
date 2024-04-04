<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\exam;
use App\Models\classe;
use App\Models\matiere;

class examcontroller extends Controller
{
    function index(Request $request){
        $getreco= exam::getreco();
        $getMatieres= matiere::getMatieres();
        $getclasse= classe::getclasse();
        return view('admin.examadmin',compact('getMatieres','getclasse','getreco'));

    }
    public function store (Request $request ){
        $exam = new exam;
        $exam->nom = $request->nom;
        $exam->ID_Class = $request->ID_Class;
        $exam->ID_Matiere = $request->ID_Matiere;
        $exam->date = $request->date;
        $exam->save();

    return redirect()->route('exams.index');

    }
    public function update(Request $request)
    {
        if ($request->ajax()) {
            $exams = exam::find($request->pk);
            if ($exams) {
                $column = $request->column;
                if ($column && in_array($column, $exams->getFillable())) {
                    $exams->update([$column => $request->value]);
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
        $exams = exam::findOrFail($id);
    
        $exams->delete();
    
        return redirect()->route('exams.index');
    }
}
