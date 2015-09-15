<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use RakutenRws_Client;

class TopController extends Controller
{

    function __construct(){
        define("APP_ID","1082596731103067333");
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        // var_dump(class_exists("RakutenRws_Client",true));
        // $client = new RakutenRws_Client();
        // // // アプリID (デベロッパーID) をセットします
        // $client->setApplicationId(APP_ID);

        // // IchibaItem/Search API から、keyword=うどん を検索します
        // $response = $client->execute('IchibaItemSearch', array(
        //   'keyword' => 'うどん'
        // ));

        // // レスポンスが正しいかを isOk() で確認することができます
        // if ($response->isOk()) {
        //     // 配列アクセスによりレスポンスにアクセスすることができます。
        //     var_dump($response['hits']);
        // } else {
        //     echo 'Error:'.$response->getMessage();
        // }
        $data = "HEllo World";
        //return null;
        return view("top/index")->with("hoge",$data);
    }
}
