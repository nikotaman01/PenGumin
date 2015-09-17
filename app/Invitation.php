<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
	protected $primaryKey = 'invitation_id';
    protected $table = "invitations";
    protected $fillable = ["created_member_id","code"];


}
