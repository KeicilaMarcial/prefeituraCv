<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cv extends Model
{
    
    protected $fillable = [
        'name', 'profession', 'gender','phoneNumber','status','file','schooling_id','data_ini','data_fim','user_id'
    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function schooling()
    {
        return $this->belongsTo('App\Schooling');
    }
}
