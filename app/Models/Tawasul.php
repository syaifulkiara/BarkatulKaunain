<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tawasul extends Model
{
    use HasFactory;
    protected $table = "tawasuls";

    public function silsilah()
    {
        return $this->belongsTo(Silsilah::class);
    }

}
