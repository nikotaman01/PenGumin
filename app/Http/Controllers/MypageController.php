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

        $data = [
            'isParent' => $member->isParent(),
            'gotPoint' => $member->getChild()->point,
            'goodsPoint' => null,
            'totalPoint' => 0,
            'doneQuestList' => [],
            'allQuestList' => [],
        ];

        $currentItem = $member->getCurrentItem();
        if ($currentItem != null) {
            $data['goodsPoint'] = $currentItem->price;
        }

        return view('mypage/index', $data);
    } 
}
