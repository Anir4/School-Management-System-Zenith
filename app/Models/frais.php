<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class frais extends Model
{
    use HasFactory;
    protected $table = 'frais';
    protected $primaryKey = 'ID_Frais';
    protected $fillable = [ 'ID_Etudiant', 'montant', 'payement','reste'];
    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class, 'ID_Etudiant', 'ID_Etudiant');
    }
}
