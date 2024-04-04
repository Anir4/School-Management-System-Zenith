<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class exam extends Model
{
    use HasFactory;
    protected $table = 'exam';
    protected $primaryKey = 'ID_Exam';
    protected $fillable = ['nom', 'ID_Class','ID_Matiere','date'];
    static public function getreco(){
        return self::select ('exam.*','class.nom as class_nom','matiere.nom as matiere_nom')
        ->join('class','class.ID_Class','=','exam.ID_Class')
        ->join('matiere','matiere.ID_Matiere','=','exam.ID_Matiere')
        ->get();

        
    }

    
    
}
