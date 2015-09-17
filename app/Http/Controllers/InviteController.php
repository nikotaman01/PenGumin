<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use App\Http\Requests;
use Session;
use App\Http\Controllers\Controller;

class InviteController extends Controller
{

    protected $member;

    public function __construct(Member $member){
        $this->middleware('auth');
        $this->member = $member;
    }
    public function index(){

        return view('invite/index');
    }
    public function email(Request $req){
        $member = $this->member;
        //ダミー
        $rakuten_id = "h329hyf83jgf93";
        //email処理(未定)

        dd($member->first());
        // $req->childEmail


    	return redirect()->to("/invite/complete")->withInput($req->all());
    }

    public function complete(){
        Session::reflash();
    	return view('invite/complete');

    }


    public function register(Request $req){
        var_dump($req->all());


        //登録処理


        return redirect()->to('/auth/login');
    }
}
