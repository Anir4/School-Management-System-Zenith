<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\class_matiere;
use App\Models\week;
use App\Models\class_subject_timetable;
use Illuminate\Support\Facades\Auth;
use App\Models\etudiant;
use App\Models\exam;
class clendarcontroller extends Controller
{   public function clendar(){
    
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


    $data['getmytimetable']=$result;
    $data['head_title']='my calendar';
    return view('etudiant.calendrie',$data);
}
}
