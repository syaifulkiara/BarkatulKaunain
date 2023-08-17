<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;
    protected $table = "artikels";


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
    return $this->belongsTo(User::class);
    }

    public function komentar()
    {
    return $this->hasMany(Komentar::class);
    }
}
