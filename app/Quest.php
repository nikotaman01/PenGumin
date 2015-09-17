<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quest extends Model
{
	protected $table = 'quests';
	protected $primaryKey = 'quest_id';
    
    public function doneQuest()
	{
		return $this->completed_at == null;
	}

	public function allQuestList()
	{
		
	}


    
    //
}
