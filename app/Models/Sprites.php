<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sprites extends Model
{
    use HasFactory;
    protected $table = 'sprites';
    protected $primaryKey = 'id';
    public $timestamps  = false;
    protected $fillable = [ "back_default",
                            "back_shiny",
                            "fk_id_pokemon",];
}
