<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Procedure extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
      'typeprocedure_id',
      'area_id',
      'description',
      'user_id',
      'administrator_id',
      'date',
      'state'
    ];

    public function typeprocedure()
    {
      return $this->belongsTo(Typeprocedure::class, 'typeprocedure_id', 'id');
    }

    public function area()
    {
      return $this->belongsTo(Area::class, 'area_id', 'id');
    }

    public function user()
    {
      return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function administrator()
    {
      return $this->belongsTo(User::class, 'administrator_id', 'id');
    }
}
