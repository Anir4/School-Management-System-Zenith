<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $table = 'admins';

    protected $fillable = [
        'nom', 'prenom', 'email', 'password', 'permissions'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
