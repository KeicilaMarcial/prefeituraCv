<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
   // use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];
    public function User() {
        return $this->hasMany('App\User');
   }
}
