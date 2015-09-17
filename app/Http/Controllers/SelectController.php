<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;

class SelectController extends Controller
{
    function __construct(){
        define("APP_ID","1082596731103067333");

    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {

        // RFC3986 形式で URL エンコードする関数
        function urlencode_rfc3986($str)
        {
            return str_replace('%7E', '~', rawurlencode($str));
        }

        $response = NULL;
        if ($request['keyword']){
            // ベースとなるリクエストURL
            $baseurl = 'https://app.rakuten.co.jp/services/api/IchibaItem/Search/20140222';

            // リクエストパラメータの作成
            $params = array();
            $params['format']  = 'json'; //レスポンスをXML形式
            $params['keyword']  = $request['keyword'];//$_REQUEST['keyword'];  // 任意のキーワード。文字コードは UTF-8
            // $params['genreId'] = '559887';
            //$params['shopCode'] = 'rakuten24';
            $params['applicationId']  = '1006734213224224132';  //アプリID/デベロッパーID
            //$params['affiliateId']  = '自分のアフィリエイトID入力'; //アフィリエイトID
            //$params['version']    = '2013-08-05';
            $params['hits']     = 10;  // 1～30

            // パラメータを昇順に並び替え
            ksort($params);
            // canonical string を作成
            $canonical_string = '';
            foreach($params as $k => $v) {
                $canonical_string .= '&' . urlencode_rfc3986($k) . '=' . urlencode_rfc3986($v);
            }
            // 先頭の'&'を除去
            $canonical_string = substr($canonical_string, 1);
            // リクエストURL を作成
            $url = $baseurl . '?' . $canonical_string;

            $contents = file_get_contents($url);
            $data = json_decode($contents, true);

            $response['keyword'] = $data;
            $response['word'] = $request;
      }

        return view('select/index')->with('indata', $response);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        if ($request['item_name']){
            // print $request['item_name'];
            // print $request['price'];
            // print $request['image'];
            // $results = DB::select('select * from users');
        }
        return view('/mypage/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    // public function show($id)
    public function show()
    {
        }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
