<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class prof extends Model
{
    use HasFactory;
    protected $table = 'prof';
    protected $primaryKey = 'ID_Prof';

    protected $fillable = ['nom', 'prenom', 'email', 'password', 'date_inscription','niveau','salaire','ID_Matiere'];
    public function user()
    {
        return $this->hasOne(User::class, 'userable_id');
    }
    static public function getreco(){
        return self::select ('prof.*','matiere.nom as matiere_nom')
        ->join('matiere','matiere.ID_Matiere','=','prof.ID_Matiere')
        ->get();

        
    }
    public function matiere()
    {
        return $this->belongsTo(matiere::class, 'ID_Matiere'); // Assuming Matiere model exists
    }
    public function classes()
    {
        return $this->belongsToMany(classe::class, 'prof_classe', 'prof_id', 'classe_id');
    }
}
