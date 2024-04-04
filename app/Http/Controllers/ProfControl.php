<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Etudiant;
use App\Models\Matiere;
use App\Models\Prof;
use App\Models\Note;
use App\Models\Ressources;
use App\Models\DevoiresEtudiante;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;




class ProfControl extends Controller
{

    public function dashboard(){
        $prof=Auth::user()->userable;
    $profId = $prof->ID_Prof;
    $matiereId= $prof->ID_Matiere;
    $etudiants = Etudiant::all();
    $classes = $prof->classes;
    $countetudiant = 0;
    $matiere = Matiere::select('nom')->find($prof->ID_Matiere);

    $resources = Ressources::whereHas('classe.profs', function ($query) use ($profId) {
        $query->where('ID_Prof', $profId);
    })->with(['classe' => function ($query) use ($profId) {
        $query->whereHas('profs', function ($query) use ($profId) {
            $query->where('ID_Prof', $profId);
        });
    }])->where('ID_Matiere',$matiereId)->get();

    $cours = $resources->where('type', 'cour')->take(3);
    $resourcesCount = $resources->count();
    $nbrclasses = count($classes);

    foreach ($classes as $class) {

        foreach ($etudiants as $etudiant) {
            if ($etudiant->ID_Class === $class->ID_Class) {
                $countetudiant++;
            }
        }

    }


    $cours->transform(function ($resource) {
        $resource->created_at = $resource->created_at->format('Y-m-d');
        return $resource;
    });

    return view('prof.dashboard', [
        'nbrclasses' => $nbrclasses,
        'resourcesCount' => $resourcesCount,
        'countetudiant' => $countetudiant,
        'cours' => $cours,
        'matiere'=>$matiere,
    ]);
    }


    public function updateProfileImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust validation rules as needed
        ]);

        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);

        $prof = Prof::find($request->id); // Assuming you have a user ID associated with Prod
        if ($prof) {
            $prof->profil = '/images/' . $imageName; // Adjust the column name as per your database schema
            $prof->save();
        }

        return response()->json(['image_url' => '/images/' . $imageName]);
    }

public function compte(){
    $prof=Auth::user()->userable;
    $matiere = Matiere::find($prof->ID_Matiere);

    return view('prof.compte', ['matiere' => $matiere]);

}

public function updateCompte(Request $request){
    $prof=Auth::user()->userable;

// Validate the incoming request data
$validatedData = $request->validate([
    'nom' => 'required|string|max:255',
    'prenom' => 'required|string|max:255',
    'email' => 'required|string|email|max:255',
    'telephone' => 'required|string|max:20',
]);

// Get the authenticated user's professor instance
$prof=Auth::user()->userable;

// Update the professor's information
$prof->nom = $validatedData['nom'];
$prof->prenom = $validatedData['prenom'];
$prof->email = $validatedData['email'];
$prof->tele = $validatedData['telephone'];

// Save the updated information
$prof->save();

$user = User::find(auth()->id());
        $user->email = $validatedData['email'];
        $user->save();
// Redirect back with a success message or any other response you prefer
return redirect()->back()->with('success', 'Compte mis à jour avec succès');


}




    public function updateStatus(Request $request, $resourceId)
    {
        $status = $request->input('status');
        $resource = DevoiresEtudiante::findOrFail($resourceId);
        $resource->status = $status;
        $resource->save();

        return response()->json(['message' => 'Status updated successfully', 'resource' => $resource]);
    }

    public function fetchStudentResponses($resourceId)
    {
        $responses = DevoiresEtudiante::where('ID_Ressources', $resourceId)
        ->with('etudiant:ID_Etudiant,nom,prenom') 
        ->get();
// Modify the created_at field before sending the response
$formattedResponses = $responses->map(function ($response) {
    $response->formatted_created_at = $response->created_at->diffForHumans();
    return $response;
});

return response()->json($formattedResponses);
        
    }


    public function destroy(Request $request)
    {
        $resourceId = $request->input('resource_id');

        $resource = Ressources::find($resourceId);

        if (!$resource) {
            return response()->json(['message' => 'Resource not found'], 404);
        }

        $resource->delete();

        return response()->json(['message' => 'Resource deleted successfully']);
    }



    public function showProfResources()
    {
        $prof=Auth::user()->userable;
        $profId = $prof->ID_Prof; // Assuming you have professor authentication set up
        $matiereId =$prof->ID_Matiere;

        // Retrieve resources for the professor along with the corresponding class names
        $resources = Ressources::whereHas('classe.profs', function ($query) use ($profId) {
            $query->where('ID_Prof', $profId);
        })->with(['classe' => function ($query) use ($profId) {
            $query->whereHas('profs', function ($query) use ($profId) {
                $query->where('ID_Prof', $profId);
            });
        }])->where('ID_Matiere',$matiereId)->get();


        $devoirs = $resources->where('type', 'devoir');
$cours = $resources->where('type', 'cour');

$devoirs->transform(function ($resource) {
    $resource->created_at = $resource->created_at->format('Y-m-d');
    return $resource;
});

$cours->transform(function ($resource) {
    $resource->created_at = $resource->created_at->format('Y-m-d');
    return $resource;
});

return view('prof.cours', [
    'devoirs' => $devoirs,
    'cours' => $cours,
]);

    }



    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:pdf|max:10240', // PDF file, max 10MB
        ]);
        // Handle file upload
        $file = $request->file('file');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('public/uploads', $fileName); // Store file in the 'uploads' directory

        // Create a new Ressources entry in the database
        $ressource = new Ressources();
        $ressource->ID_Class = $request->input('class_id');
        
        $ressource->ID_Matiere = $request->input('matiere_id');
        $ressource->type = $request->input('type'); // You can adjust this as needed
        $ressource->URL = Storage::url($filePath); // Get public URL for the file
        $ressource->titre = $file->getClientOriginalName(); // Original file name as titre
        $ressource->description = ''; // Original file name as titre
        $ressource->save();
        return response()->json(['message' => 'File uploaded successfully', 'ressource' => $ressource]);
    }


    public function fetchStudents(Request $request)
    {
        $classe = $request->input('classe');
        $matiereId = $request->input('matiere');

        $students = Etudiant::where('ID_Class', $classe)
        ->with(['notes' => function ($query) use ($matiereId) {
            $query->where('ID_Matiere', $matiereId);
        }])
        ->get();

        return response()->json($students);
    }

    public function getMatiere($id)
    {
        $prof = Prof::find($id);
        $matiere = Matiere::find($prof->ID_Matiere);

        if (!$matiere) {
            return response()->json(['error' => 'Matiere not found'], 404);
        }
        // Retrieve the classes and their names and niveaux
$classes = $prof->classes;




$classeData = [];

foreach ($classes as $classe) {
    $classeData[] = [
        'id' => $classe->ID_Class, // Assuming 'id' is the primary key in Classe model
        'name' => $classe->nom,
        'niveau' => $classe->niveau,
    ];
}
    
        return response()->json(['matiere' => [$matiere], 'classes' => $classeData]);
    }

    public function updateStudentNotes(Request $request)
{
    $studentId = $request->input('studentId');
    $matiereId = $request->input('matiereId');

    $note1 = $request->input('note1');
    $note2 = $request->input('note2');
    $devoir = $request->input('devoir');
    $mention = $request->input('mention');

    // Check if the note exists for the student and subject
    $note = Note::where('ID_Etudiant', $studentId)
        ->where('ID_Matiere', $matiereId)
        ->first();

    if ($note) {
        $note->note1 = $note1;
        $note->note2 = $note2;
        $note->devoir = $devoir;
        $note->mention = $mention;
        $note->save();
        return response()->json(['success' => true, 'message' => 'Notes mises à jour avec succès']);
    } else {
        $newNote = new Note();
        $newNote->ID_Etudiant = $studentId;
        $newNote->ID_Matiere = $matiereId;
        $newNote->note1 = $note1;
        $newNote->note2 = $note2;
        $newNote->devoir = $devoir;
        $newNote->mention = $mention;
        $newNote->save();
        return response()->json(['success' => true, 'message' => 'Nouvelle note créée avec succès']);
    }
}

}
