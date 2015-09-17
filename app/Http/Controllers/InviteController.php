<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class InviteController extends Controller
{
    public function index(){

        return view('invite/index');
    }
    public function email(Request $req){
    	return redirect()->to("/invite/complete")->withInput($req->all());
    }

    public function complete(){
    	return view('invite/complete');
    }


    public function register(Request $req){
        var_dump($req->all());
        //登録処理

        
        return redirect()->to('/mypage/index');
    }
}
