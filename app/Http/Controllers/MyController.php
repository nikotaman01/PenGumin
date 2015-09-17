<?php
namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;

class MyController extends BaseController {
    function show(){
        return view('mypage/index');
    }
}
