<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Propriete extends Model
{
    protected $table = "proprietes";
    public $timestamps = false;
    use HasFactory;

    public function categorie()
    {
        return $this->belongsTo(Categorie_propriete::class);
    }
}
