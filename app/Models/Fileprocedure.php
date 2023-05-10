<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fileprocedure extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
      'procedure_id',
      'requirement_id',
      'name',
      'file',
      'state',
    ];

    public function requirements()
    {
      return $this->belongsToMany(Requirement::class);
    }
}
