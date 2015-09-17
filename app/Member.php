<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Member extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{

	use Authenticatable, Authorizable, CanResetPassword;

	protected $table = 'members';
	protected $primaryKey = 'member_id';
    protected $fillable = ['name','email','password','parent_id','point'];
    protected $hidden = ['password', 'remember_token'];


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

	public function getCurrentItem()
	{
		return $this->getChild()->items()->where('did_get', null)->first();
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

	public function quests()
	{
		if ($this->parent_id == null) {
			return $this->assigningQuests();
		} else {
			return $this->assignedQuests();
		}
	}

	public function assigningQuests()
	{	
		return $this->hasMany('App\Quest', 'assigning_member_id');
	}

	public function assignedQuests()
	{	
		return $this->hasMany('App\Quest', 'assigned_member_id');
	}

}
