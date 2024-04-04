<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class note extends Model
{
    use HasFactory;

    protected $table = 'notes';
    protected $primaryKey = 'ID_Notes';


    protected $fillable = [
        'ID_Etudiant',
        'ID_Matiere',
        'note1',
        'note2',
        'devoir',
        'mention'

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
