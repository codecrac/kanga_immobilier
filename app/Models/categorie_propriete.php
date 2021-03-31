<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie_propriete extends Model
{
    protected $table = "categories_proprietes";
    protected $guarded = [];
    public $timestamps = false;


    public function proprietes()
    {
        return $this->hasMany(Propriete::class,'categorie_id');
    }

    use HasFactory;
}
