<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\classe;
use App\Models\niveau;
use Illuminate\Support\Facades\Auth;
use App\Models\class_matiere;
use App\Models\week;
use App\Models\matiere;
use App\Models\Note;
use App\Models\class_subject_timetable;

class dashbordetudiant extends Controller
{
    public function index()
    { 
        $etudiant=Auth::user()->userable;
        $getMatieres= matiere::getMatieres();
        $notesc = Note::where('ID_Etudiant', $etudiant->ID_Etudiant)->get();
        $class=classe::find($etudiant->ID_Class);
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
                 $dataw['fullcalendar_day']=$valuew->fullcalendar_day;
    
                 $variable = class_subject_timetable::getRecordclassmatiere($value->ID_Class, $value->ID_Matiere, $valuew->id);
                 
                 if (!empty($variable)) {
                 $dataw['debut']=$variable->debut;
                 $dataw['fin']=$variable->fin;
                 $dataw['room_num']=$variable->room_num;
                 $week[]=$dataw;
                  }
                 
            }
            $datas['week']=$week;
            $result[]=$datas;
    
    
        }

        $data=$result;
      return view('etudiant.dashboard',compact('etudiant', 'class','data','notesc','getMatieres'));
}
}

