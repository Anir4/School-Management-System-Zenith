<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class matiere extends Model
{
    use HasFactory;
    protected $table = 'matiere';
    protected $primaryKey = 'ID_Matiere';

    protected $fillable = [ 'nom'];
    public static function getMatiere()
    {
        return self::all();
    }
    public static function getMatieres()
    {
        $return = matiere::all();
    return  $return;
}}
