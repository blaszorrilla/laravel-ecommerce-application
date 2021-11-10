<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'roles';
    public $timestamps = false;
    /**
     * @var array
     */
    protected $fillable = [
       'description'
    ];
    public function user(){
        return $this->hasMany('App\Models\User'); //un rol puede tener varios usuarios
    }
}
