<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable=[
    	'name',
    	'description',
    	'project_id',
    	'company_id',
    	'user_id',
    	'days',
    	'hours',

    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function project(){
        return $this->belongsTo('App\Project');
    }

    public function company(){
        return $this->belongsTo('App\Company');
    }

    public function users(){
        return $this->belongsTo('App\User');
    }

    public function comments(){
        return $this->morpMany('App\Comment','commentable');
    }
}
