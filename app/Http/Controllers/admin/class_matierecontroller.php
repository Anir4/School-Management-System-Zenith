<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\class_matiere;
use App\Models\classe;
use App\Models\matiere;
use Illuminate\Support\Facades\Auth;
class class_matierecontroller extends Controller
{
    public function list (Request $request){
$data['getreco']= class_matiere::getreco();
return view('admin.class_matiereadmin',$data);
    }
    public function add (Request $request){
        $data['getreco']= class_matiere::getreco();
        $data['getClasse']= classe::getclasse();
        $data['getMatieres']= matiere::getMatieres();
        return view('admin.class_matiereadmin',$data);
    }
    public function insert (Request $request){
        if (!empty($request->ID_Matiere)) {
            foreach ($request->ID_Matiere as $ID_Matiere) {
                $save = new class_matiere;
                $save->	ID_Class=$request->	ID_Class;
                $save->	ID_Matiere=$ID_Matiere;
                $save->	created_by=$request->created_by;
                $save->save();
                
            }
            return redirect('admin/class_matiereadmin')->with('success',"Setting Successfully Updated");
        }

        else {
            return redirect()->back()->with('error',"try again");
        }
        
    }
    
    public function update(Request $request)
    {
        if ($request->ajax()) {
            $value = class_matiere::find($request->pk);
            if ($value) {
                $column = $request->column;
                if ($column && in_array($column, $value->getFillable())) {
                    $value->update([$column => $request->value]);
                    return response()->json(['success' => true]);
                }
                return response()->json(['error' => 'Invalid column'], 400);
            }
            return response()->json(['error' => 'classe-matiere not found'], 404);
        }
        return response()->json(['error' => 'Invalid request'], 400);
    }
    

    public function destroy($id)
    {
        $value = class_matiere::findOrFail($id);
    
        $value->delete();
    
        return redirect('admin/class_matiereadmin')->with('success',"Setting Successfully Updated");
    }
}
