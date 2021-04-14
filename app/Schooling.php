<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schooling extends Model
{
    //use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'level',
    ];
    public function cv()
    {
        return $this->hasMany('App\Cv');
    }
    public function schooling()
    {
        return $this->belongsTo('App\Schooling');
    }
}
