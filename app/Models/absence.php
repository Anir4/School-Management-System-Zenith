<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class absence extends Model
{
    use HasFactory;
    protected $table = 'absences';
    protected $primaryKey = 'id';


    protected $fillable = [
        'ID_Etudiant',
        'ID_Matiere',
        'present',
        'date'
    ];

    // Define the relationship with the Etudiant model
    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class, 'ID_Etudiant', 'ID_Etudiant');
    }
    public function matiere()
    {
        return $this->belongsTo(Matiere::class, 'ID_Matiere', 'ID_Matiere');
    }
}

