<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
    /**
    * The database table used by the model.
    *
    * @var string
    */
    protected $table = 'cities';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'department_id'];
}
