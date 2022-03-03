<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $fillable = ['name','city','marks','image']; //calling column feilds
    
}