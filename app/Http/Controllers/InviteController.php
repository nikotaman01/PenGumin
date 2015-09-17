<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use App\Invitation;
use App\Http\Requests;
use Session;
use App\Http\Controllers\Controller;

class InviteController extends Controller
{

    protected $member;
    protected $invitation;

    public function __construct(Member $member,Invitation $invitation){
        $this->middleware('auth');
        $this->member = $member;
        $this->invitation = $invitation;
    }
    public function index(Request $req){
         return view('invite/index');
    }
    public function email(Request $req){
        $invitation = $this->invitation;
        //乱数
        $code = rand();
        $data = array(
            "created_member_id" => $req->user()->member_id,
            "code"   =>  $code);

        $invitation->fill($data);

        if($invitation->save()){
            return redirect()->to("/invite/complete")->withInput($data);
        }else{
            return redirect("/auth/login");
        }
        //email処理(未定)
        //
        //dd($member->first());
        // $req->childEmail
    }

    public function complete(){
        Session::reflash();
    	return view('invite/complete');

    }


    public function register(Request $req){
        //子のみアクセス

        //自分のID
        $id = $req->user()->member_id;
        //メンバーモデル
        $member = $this->member;
        //invitation_code
        $code = $req->code;

        //親のID
        $invObj = $this->invitation->where("code","=",$code)->first();


        if($invObj){
            $parent_id = $invObj->created_member_id;
            //親のIDと招待を送ったIDが同じなら弾く
            if($id === $parent_id){
                return redirect()->to('/auth/logout');
            }

            //子のレコードを更新
            $member->where("member_id","=",$id)->update(["parent_id" => $parent_id]);
            //$member->find($id)->parent_id = $parent_id;

        }

        return redirect()->to('/mypage');

        //return redirect()->to('/auth/login');
    }
}
