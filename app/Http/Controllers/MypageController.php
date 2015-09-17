<?php

namespace App\Http\Controllers;

use Auth;
use App\Http\Controllers\Controller;

class MypageController extends Controller
{
    public function index(Request $req)
    {
        $member = Auth::user();

        $member = new \App\Member(); // TODO authentication required
        $member->member_id = 2;
        $member->parent_id = 1;
        $member->point = 500;

        $data = [
            'isParent' => $member->isParent(),
            'gotPoint' => $member->getChild()->point,
            'goodsPoint' => 720,
            'totalPoint' => 100,
            'doneQuestList' => [],
            'allQuestList' => [],
        ];
        return view('/mypage/index',$data);
    }

    public function select()
    {
        print "hoge";

        return view('select/index');
    }

    public function show()
    {

        return view('/mypage/index');
    }

}
