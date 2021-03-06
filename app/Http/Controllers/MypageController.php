<?php

namespace App\Http\Controllers;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Member;
use App\Quest;
use Session;
use App\Item;
use DB;

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
            return redirect()->to('/invite/index');
        }

        $data = [
            'isParent' => $member->isParent(),
            'gotPoint' => $member->getChild()->point,
            'goodsPoint' => null,
            'totalPoint' => 0,
            'doneQuestList' => ['name','point','quest_id'],
            'allQuestList' => ['name','point','quest_id'],
            'gotGoodsList' => ['picture','name','gotDate'],
            'pastQuestList' => ['name','point','count'],
            'firstGet'  =>  Session::get('getFlag')? Session::get('getFlag'):false,
        ];
        $currentItem = $member->getCurrentItem();
        if ($currentItem != null) {
            $data['goodsPoint'] = $currentItem->price;
            $data['goodsPicture'] = $member->getCurrentItem()->picture;

        }

        $data['totalPoint'] = $member->quests()->whereNotNull('approved_at')->sum('point');
        $data['doneQuestList'] = $member->quests()->whereNotNull('approved_at')->whereNull('completed_at')->get();
        $data['allQuestList'] = $member->quests()->get();
        $data['gotGoodsList'] = $member->items()->whereNotNull('did_get')->get();
        $data['pastQuestList'] = $member->quests()->whereNotNull('completed_at')->get();

        return view('mypage/index', $data);
    }

    public function select()
    {
        return view('select/index');
    }

    public function cancel()
    {
        $member = Auth::user();
        $id = $member->getChild()->member_id;
        DB::delete('delete from items where member_id = ?', [$id]);
        return redirect()->action('MypageController@index');
    }

    public function done(Item $item){
        $login_user = Auth::user();
        $child = $login_user->getChild();

        $child_member_id = $child->member_id;

        $item_record = $item->where("member_id","=",$child_member_id)->where('did_get','=',NULL)->first();
        $item_record->did_get = date("Y/m/d H:i:s");
        $item_record->save();

        return redirect()->to('/mypage/cart');

    }

    public function clear(Request $req, Quest $quest){
        //対象のクエストID
        $questId = $req->questId;

        $questRecord = $quest->where("quest_id","=",$questId)->first();
        $questRecord->approved_at = date("Y/m/d H:i:s");
        $questRecord->save();

        Session::put("getFlag",true);
        return redirect()->action('MypageController@index');
    }

    public function accept(Request $req, Quest $quest){
        //対象のクエストID
        $questId = $req->questId;

        $questRecord = $quest->where("quest_id","=",$questId)->first();
        $questRecord->completed_at = date("Y/m/d H:i:s");
        $questRecord->save();
        return redirect()->action('MypageController@index');
    }

    public function cart(){
        return view('mypage/cart');
    }
}
