<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{

	protected $table = 'persons';

    public $fillable = ['code','name','gender','email','lastname','city','birth','address','comments'];

}

