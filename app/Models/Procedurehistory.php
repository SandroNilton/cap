<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Procedurehistory extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
      'procedure_id',
      'typeprocedure_id',
      'area_id',
      'user_id',
      'administrator_id',
      'description',
      'action',
      'state'
    ];

    public function area()
    {
      return $this->belongsTo(Area::class, 'area_id', 'id');
    }
}
