<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pokemons extends Model
{
    use HasFactory;
    protected $table = 'pokemons';
    protected $primaryKey = 'id';
    public $timestamps  = false;
    protected $fillable = [ "apiid",
                            "name",
                            "base_experience",
                            "weight",
                            "height",];
}
