<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;
use Auth;

class SelectController extends Controller
{
    function __construct(){
        define("APP_ID","1082596731103067333");
        $this->middleware('auth');

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

        $member = Auth::user();
        if ($request['item_name']){
            //user_idを引き取る
            $id = $member->member_id;

            //user_idの賞品選択済を確認
            $results = DB::select('select created_at from items where member_id = ?', [$id]);
            var_dump($results);

            if(empty($results)){
                //新規ならレコードの追加
                DB::insert('insert into items (member_id, product_id, name, created_at, updated_at, price) values (?, ?, ?, ?, ?, ?)', [$id, $request['code'], $request['item_name'], date('Y-m-d'), date('Y-m-d'), $request['price'] ]);
            }else{
                //存在するなら賞品を更新する
                DB::update('update items set product_id = ?, name = ?, updated_at = ?, price = ?  where member_id = ?', [$id, $request['item_name'], date('Y-m-d'), $request['price'], $id]);
            }
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
