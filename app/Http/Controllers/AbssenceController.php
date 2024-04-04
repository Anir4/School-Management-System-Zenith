<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etudiant;
use App\Models\Matiere;
use App\Models\Prof;
use App\Models\Absence;

use function PHPUnit\Framework\returnSelf;

class AbssenceController extends Controller
{
    public function fetchStudents(Request $request)
    {
        $classe = $request->input('classe');
        $matiereId = $request->input('matiere');
        $date = $request->input('date');

        $startRange = date('Y-m-d H:00:00', strtotime($date));
        $endRange = date('Y-m-d H:59:59', strtotime($date)); 

        $students = Etudiant::where('ID_Class', $classe)
            ->with(['absences' => function ($query) use ($matiereId, $startRange, $endRange) {
                $query->where('ID_Matiere', $matiereId)
                    ->whereBetween('date', [$startRange, $endRange]);
            }])
            ->get();


        return response()->json($students);
    }


    public function updateAll(Request $request)
{
    $updates = $request->input('updates');
    $Subject = $request->input('Subject');
    $dateInput = $request->input('dateInput');

    foreach ($updates as $update) {
        $studentID = $update['student_id'];
        $absenceStatus = $update['absence_status'];

        // Check if the absence record exists for the student, subject, and date
        $absence = Absence::where('ID_Etudiant', $studentID)
            ->where('ID_Matiere', $Subject)
            ->where('date', $dateInput)
            ->first();

        if ($absence) {
            // Update the 'present' column
            $absence->present = $absenceStatus;
            $absence->save();
            $response= response()->json(['success' => true, 'message' => 'Absences mises à jour avec succès']);
        } else {
            Absence::create([
                'ID_Etudiant' => $studentID,
                'ID_Matiere' => $Subject,
                'present' => $absenceStatus,
                'date' => $dateInput,
            ]);
            $response= response()->json(['success' => true, 'message' => 'Absences créée avec succès']);
            
        }
    }
    return $response;
}

    public function searchStudent(Request $request){

         if ($request->filled('id')) {
            $student = Etudiant::find($request->input('id'));
        } else {
            $request->validate([
                'nom' => 'required|string',
                'prenom' => 'required|string',
            ]);

            $student = Etudiant::where('nom', $request->input('nom'))
                ->where('prenom', $request->input('prenom'))
                ->first();
        }

        if (!$student) {
            return response()->json(['student' => $student]);
        }

        $absences = Absence::where('ID_Etudiant', $student->ID_Etudiant)->where('ID_Matiere',$request->input('matier'))
            ->where('present', 0)->get();

        return response()->json(['student' => $student, 'absences' => $absences]);

    }

}
