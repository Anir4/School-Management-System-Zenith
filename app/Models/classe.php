<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class classe extends Model
{  
    use HasFactory;
    protected $table = 'class';
    protected $primaryKey = 'ID_Class';

    protected $fillable = [ 'nom', 'filiere', 'niveau'];
    public static function getClass()
    {
        return self::all();
    }
    public static function getclasse()
    {
        $return = classe::all();
    return  $return;
}
public function profs()
    {
        return $this->belongsToMany(Prof::class, 'prof_classe', 'classe_id', 'prof_id');
    }

}
    
    

