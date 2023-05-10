<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Typeprocedure extends Model
{
    use HasFactory;

    protected $fillable = [
      'name',
      'description',
      'area_id',
      'category_id',
      'price',
      'state',
    ];

    public function area()
    {
      return $this->belongsTo(Area::class, 'area_id', 'id');
    }

    public function category()
    {
      return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function requirements()
    {
      return $this->belongsToMany(Requirement::class);
    }
}
