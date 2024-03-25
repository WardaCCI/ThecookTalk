<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    // use HasFactory;
    protected $table = "recipes";

    protected $fillable = [
        'recipename',
        'time',
        'cookingtype',
        'category',
        'difficulty',
        'visibility',
        'completed',
        'completed',
        'for',
        'id_unit',
        'id_user',
    ];

    public $timestamps = false;
    public function images()
    {
        return $this->hasMany(Image::class, 'id_recipe');
    }
  // Relation avec les données de notation
  public function ratings()
  {
      return $this->hasMany(StarComment::class, 'id_recipe'); // Assurez-vous que 'id_recipe' correspond au nom de la colonne dans la table 'stars_comments'
  }
     
}
