<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DevoiresEtudiante extends Model
{
    use HasFactory;
    protected $table = 'devoires_etudiante';

    protected $fillable = [
        'ID_Etudiant', 'ID_Ressources','titre', 'status', 'pdf_url',
    ];

    // Define relationships if needed
    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class, 'ID_Etudiant');
    }

    public function ressource()
    {
        return $this->belongsTo(Ressources::class, 'ID_Ressources');
    }
}
