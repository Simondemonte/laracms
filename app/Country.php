<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //
	public function posts(){
		return $this->hasManyThrough('App\Post', 'App\User');
		//return $this->hasManyThrough(TABLE, INTERMEDIATETABLE, country_id, user_id)
	}
}
