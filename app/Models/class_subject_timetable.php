<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class class_subject_timetable extends Model
{
    use HasFactory;
    protected $table = 'class_subject_timetable';
    static public function getRecordclassmatiere($ID_Class,$ID_Matiere,$week_id){
        return self::where('ID_Class','=',$ID_Class)
        ->where('ID_Matiere','=',$ID_Matiere)
        ->where('week_id','=',$week_id)
        ->first();
    }
}
