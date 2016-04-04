<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employee';
    protected $primaryKey = 'emp_id';
    public $timestamps = false;

    public function department() {
    	return $this->belongsTo('App\Department', 'dep_id');
    }
}
