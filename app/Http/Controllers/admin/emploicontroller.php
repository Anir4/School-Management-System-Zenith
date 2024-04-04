<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\classe;
use App\Models\matiere;
use App\Models\class_matiere;
use App\Models\week;
use App\Models\class_subject_timetable;
use App\Models\etudiant;
use Illuminate\Support\Facades\Auth;
class emploicontroller extends Controller
{
    public function list(Request $request){
        
        $data['getClass']=classe::getClass();
       
        $data['getMatiere']=matiere::getMatiere();
       $getweek=week::getRecord();
      $week=array();
      foreach($getweek as $value)
        {   $dataw=array();
            $dataw['week_id']=$value->id;
            $dataw['week_name']=$value->name;
            if (!empty($request->ID_Class)&&!empty($request->ID_Matiere)) {
                $var = class_subject_timetable::getRecordclassmatiere($request->ID_Class, $request->ID_Matiere, $value->id);
               
                if (!empty($var)) {
                    $dataw['debut']=$var->debut;
                    $dataw['fin']=$var->fin;
                    $dataw['room_num']=$var->room_num;
                }
              
                else {
                    $dataw['debut']='';
                    $dataw['fin']='';
                    $dataw['room_num']='';
                }
            }
            else{
                $dataw['debut']='';
                $dataw['fin']='';
                $dataw['room_num']='';
            }
            $week[]=$dataw;
        }
        $data['week']=$week;
        return view ('admin.emploiadmin',$data);
    }
    public function get_Matiere(Request $request){
       $getMatiere = class_matiere::mysubject($request->ID_Class);
       $html="<option value=''>Select</option>";
       foreach($getMatiere as $value){
            $html .= "<option value='".$value->ID_Matiere."'>".$value->nom_matiere ."</option>";
       }
       $json['html']=$html;
       echo json_encode($json);  
      }
    public function insert_update(Request $request){
        class_subject_timetable::where('ID_Class','=',$request->ID_Class)->where('ID_Matiere','=',$request->ID_Matiere)->delete();
        foreach ($request->emploi as $emploi) {
            if(!empty($emploi['week_id'])&& !empty($emploi['debut'])&&!empty($emploi['fin'])&&!empty($emploi['room_num'])){
                $save = new class_subject_timetable;
                $save->	week_id=$emploi['week_id'];
                $save->	ID_Class=$request->	ID_Class;
                $save->	ID_Matiere=$request->ID_Matiere;
                $save->	debut=$emploi['debut'];
                $save->	fin=$emploi['fin'];
                $save->	room_num=$emploi['room_num'];
                $save->save();

            }
        }
        return redirect()->back()->with('success',"emploi successfuly saved");
    }
    public function mytimetable(Request $request){
        $result=array();
        $etudiant=Auth::user()->userable;
        $getRecord=class_matiere::mysubject($etudiant->ID_Class);
        foreach ($getRecord as  $value) {
            $datas['nom']=$value->nom_matiere;
            $getweek=week::getRecord();
            $week=array();
            foreach($getweek as $valuew) {
                $dataw=array();
                 $dataw['week_name']=$valuew->name;

                 $var = class_subject_timetable::getRecordclassmatiere($value->ID_Class, $value->ID_Matiere, $valuew->id);
                 
                 if (!empty($var)) {
                 $dataw['debut']=$var->debut;
                 $dataw['fin']=$var->fin;
                 $dataw['room_num']=$var->room_num;
                  }
                  else{
                    $dataw['debut']='';
                    $dataw['fin']='';
                    $dataw['room_num']='';
                  }
                 $week[]=$dataw;
            }
            $datas['week']=$week;
            $result[]=$datas;


        }
        $data['getRecord']=$result;
        
         return view ('etudiant.emploi',$data);
    }
}
