<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = "members";
    protected $fillable = ['name','email','parent_id','point'];
    
}
