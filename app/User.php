<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
public function post(){
		return $this->hasOne('App\Post');
		//hasOne(RELATEDMODEL, FOREIGNKEY);
		//RELATEDMODEL adalah model yang ingin direlasikan dengan User, yaitu Post
		// secara default FOREIGNKEY adalah MODELNAME_id
		// dalam kasus ini user_id	
	}
	public function roles(){
		return $this->belongsToMany('App\Role')->withPivot('created_at');
		// to customize table name and columns follow the format bellow
		// return $this->belongsToMany('App\Role', 'user_roles', user_ud'
	}
}