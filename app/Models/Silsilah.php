<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Silsilah extends Model
{
    use HasFactory;
    protected $table = "silsilahs";

    public function tawasul()
    {
        return $this->hasMany(Tawasul::class);
    }
}
