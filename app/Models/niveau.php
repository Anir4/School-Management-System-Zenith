<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class niveau extends Model
{
    use HasFactory;
    protected $table = 'niveau';
    protected $primaryKey = 'ID_Niveau';

    protected $fillable = [ 'nom'];
    
    public static function getniveau()
    {
        $return = niveau::all();
    return  $return;
}
    
}
