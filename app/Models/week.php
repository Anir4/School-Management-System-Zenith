<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class week extends Model
{
    use HasFactory;
    protected $table = 'weeks';
    protected $fillable = ['name'];
    static function getRecord(){
        return week::get();
    }
}
