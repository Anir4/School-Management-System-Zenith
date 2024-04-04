<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class parametre extends Model
{
    use HasFactory;
    protected $table = 'parametre';
    protected $primaryKey = 'ID_Parametre';
    protected $fillable = ['paypal', 'logo', 'Fevicon'];

    public static function getSingle()
    {
        return self::find(1);
    }

    public function getLogo()
    {
        if (!empty($this->logo) && file_exists('upload/setting/' . $this->logo)) {
            return url('upload/setting/' . $this->logo);
        } else {
            return '';
        }
    }

    public function getFavicon()
    {
        if (!empty($this->Fevicon) && file_exists('upload/setting/' . $this->Fevicon)) {
            return url('upload/setting/' . $this->Fevicon);
        } else {
            return '';
        }
    }
}
