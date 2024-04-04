<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class class_matiere extends Model
{
    use HasFactory;
    protected $table = 'class_matiere';
    protected $primaryKey = 'ID_Class_matiere';

    protected $fillable = [ 'ID_Class', 'ID_Matiere', 'status','deleted','created_by',];
    static public function mysubject($ID_Class){
        return self::select ('class_matiere.*', 'matiere.nom as nom_matiere')
        ->join('matiere','matiere.ID_Matiere','=','class_matiere.ID_Matiere')
        ->join('class','class.ID_Class','=','class_matiere.ID_Class')
        ->join('users','users.id','=','class_matiere.created_by')
        ->where('class_matiere.ID_Class','=',$ID_Class)
        ->where('class_matiere.deleted','=',0)
        ->where('class_matiere.status','=',0)
        ->orderBy('class_matiere.ID_Class_matiere','asc')
        ->get();
        
    }
    static public function getRecord(){
        return self::get();
    }
    static public function getMatiere(){
        return self::get();
    }
    static public function getreco(){
        return self::select ('class_matiere.*', 'class.nom as class_nom','matiere.nom as matiere_nom')
        ->join('matiere','matiere.ID_Matiere','=','class_matiere.ID_Matiere')
        ->join('class','class.ID_Class','=','class_matiere.ID_Class')
        ->orderBy('class_matiere.ID_Class_matiere','asc')
        ->paginate(20);
        
    }
}
