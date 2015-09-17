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
        $data['totalPoint'] = $member->getChild()->quests()->sum('point');
        return view('mypage/index', $data);
    } 
}
