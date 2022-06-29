<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class jobs extends Model
{
 	protected $primaryKey = 'id';
  	protected $table = 'jobs';
    protected $guarded = [];  
    
    public function user(){
    	return $this->belongsTo('App\Models\User', 'user_id' , 'id');
    }
}
