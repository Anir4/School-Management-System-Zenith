<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class etudiant extends Model
{
    use HasFactory;
    protected $table = 'etudiant';
    protected $primaryKey = 'ID_Etudiant';
    protected $fillable = ['nom', 'prenom','email','date_naissance', 'tele','ID_Niveau','ID_Class','filiere','date_inscription', 'password', 'created_at','updated_at'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    static public function getreco(){
        return self::select ('etudiant.*','class.nom as class_nom','niveau.nom as niveau_nom')
        ->join('class','class.ID_Class','=','etudiant.ID_Class')
        ->join('niveau','niveau.ID_Niveau','=','etudiant.ID_Niveau')
        ->get();

        
    }
    public function notes()
    {
        return $this->hasMany(note::class, 'ID_Etudiant', 'ID_Etudiant');
    }
    public function absences()
    {
        return $this->hasMany(absence::class, 'ID_Etudiant', 'ID_Etudiant');
    }
}
