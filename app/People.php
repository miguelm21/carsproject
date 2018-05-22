<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    /**
    * The database table used by the model.
    *
    * @var string
    */
    protected $table = 'people';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'lastname', 'identifier', 'cellphone', 'email', 'city_id'];
}
