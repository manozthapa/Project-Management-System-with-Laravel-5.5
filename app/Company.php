<?php

namespace App;

use App\Company;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    
    	protected $fillable=[
    	'name',
    	'description',
    	'user_id',
    ];

    public function users(){
        return $this->belongsTo('App\User');
    }

    public function projects(){
    	return $this->hasMany('App\Project');
    }

    public function comments(){
        return $this->morpMany('App\Comment','commentable');
    }
}
