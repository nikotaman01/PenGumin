<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
	protected $table = 'members';
	protected $primaryKey = 'member_id';
    protected $fillable = ['name','email','parent_id','point'];

	public function isParent()
	{
		return $this->parent_id == null;
	}

	public function getChild()
	{
		if($this->isParent()){
			return $this->childMember;
		}else{
			return $this;
		}
	}	

	public function parentMember()
	{	
		return $this->belongsTo('App\Member', 'parent_id');
	}

	public function childMember()
	{	
		return $this->hasOne('App\Member', 'parent_id');
	}

	public function items()
	{	
		return $this->hasMany('App\Item');
	}
}
