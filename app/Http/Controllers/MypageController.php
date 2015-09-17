<?php

namespace App\Http\Controllers;

use Auth;
use App\Http\Controllers\Controller;

class MypageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $member = Auth::user();
        if ($member->isParent() && $member->getChild() === null) {

        }

        $data = [
            'isParent' => $member->isParent(),
            'gotPoint' => $member->getChild()->point,
            'goodsPoint' => null,
            'totalPoint' => 0,
            'doneQuestList' => ['name','point','quest_id'],
            'allQuestList' => ['name','point','quest_id'],
            'gotGoodsList' => ['picture','name','gotDate'],
            'pastQuestList' => ['name','point','count']
        ];

        $currentItem = $member->getCurrentItem();
        if ($currentItem != null) {
            $data['goodsPoint'] = $currentItem->price;
        }

        //$data['totalPoint'] = $member->quests()->whereNotNull('approved_at')->sum('point');
        //$data['doneQuestList'] = $member->quests()->whereNotNull('approved_at')->whereNull('completed_at')->get();
        $data['allQuestList'] = $member->quests()->get();
        $data['gotGoodsList'] = $member->items()->whereNotNull('did_get')->get();
        $data['pastQuestList'] = $member->quests()->whereNotNull('completed_at')->get();

        return view('mypage/index', $data);
    } 
}
