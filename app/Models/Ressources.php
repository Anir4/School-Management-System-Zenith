<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ressources extends Model
{
    use HasFactory;
    protected $table = 'ressources'; // Specify the actual table name if different
    protected $primaryKey = 'ID_Ressources';


    protected $fillable = [
        'ID_Class',
        'ID_Matiere',
        'type',
        'URL',
        'titre',
    ];
    public function classe()
    {
        return $this->belongsTo(Classe::class, 'ID_Class');
    }
}
