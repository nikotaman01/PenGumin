<?php
// header("Content-type:text/html;charset=UTF-8");
//mb_language('Japanese');
/**
 * Short description for select.php
 *
 * @package select
 * @author matsumotoyasuyuki <matsumotoyasuyuki@matsumotoyasuyuki-no-MacBook-Air.local>
 * @version 0.1
 * @copyright (C) 2015 matsumotoyasuyuki <matsumotoyasuyuki@matsumotoyasuyuki-no-MacBook-Air.local>
 * @license MIT
 */

$API_NAME = "PenGumin";

$count = 0;
// 連想配列から値を取得
if ($indata) {
    $data = $indata['keyword'];

    // 検索数
    $count = $data['count'];
    // 商品情報
    $item_list = $data['Items'];

    $word = $indata['word'];
    $kword = $word['keyword'];

//     $keys = array_keys($data);
//
// // 配列数分ループして、キーを取り出して表示する。
// Foreach ($keys as $key) {
//     print $key;
// }
}


?>

<html lang="ja">
<head>

<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<title>賞品選択</title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  <h1 style="color: red;">賞品選択</h1>
  <hr size="1" noshade><?php echo $API_NAME; ?><hr size="1" noshade>

  <form action="#" method="get">
    <table width="60%" border="0" cellspacing="0" cellpadding="0" style="margin: 5px 0pt 0pt 0px;">
      <tr>
        <td>

          <table width="80%" border=0 cellspacing=1 cellpadding=5 style="font-size: 12px;">
            <tr>
              <td>ほしい賞品</td>
              <td>

                <input type="text" class="form-control input" placeholder="Default input" name="keyword" value="<?php isset($kword)? $kword:''  ?>" size="30">
              </td>
             <td>
                <input type="submit" class="btn btn-danger" name="submit" value="賞品を調べる">
                <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
             </td>
            </tr>
          </table>

        </td>
      </tr>
    </table>
  </form>

  <font style="font-size: 14px;">
<?php if ($count > 0) : ?>
見つかった件数: <?php echo number_format($count); ?>件<br>
    <table width="70%" border="0" cellspacing="0" cellpadding="0" style="margin: 5px 0pt 0pt 0px;">
      <tr>
        <td bgcolor="#afafaf  ">
          <table width="100%" border=0 cellspacing=1 cellpadding=5 style="font-size: 12px;">
            <tr align="center" style="background-color: #eeeeee  ;">
              <td width="10%">決定</td>
              <td width="8%">写真</td>
              <td width="47%">賞品名</td>
              <td width="15%">ポイント</td>
            </tr>
<?php foreach ($item_list as $data) : ?>
<?php $item = $data['Item']; ?>
            <tr style="background-color: #ffffff  ;">
              <td width="10%" align="center"><form action="#" method="post">
                <input type="submit" class="btn btn-danger" name="decide" value="決定">
                <input type="hidden" name="ddata" value="<?php $item ?>">
                <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
              </form></a></td>

              <td width="8%" align="center"><a href="<?php echo $item['itemUrl']; ?>" target="_top"><img src="<?php echo $item['smallImageUrls'][0]['imageUrl']; ?>" border=0></a></td>
              <td width="47%" align="left"><a href="<?php echo $item['itemUrl']; ?>" target="_top"><font size="-1"><?php echo $item['itemName']; ?></a></td>
              <td width="15%" align="right" nowrap> <?php echo number_format($item['itemPrice']); ?> P</td>
            </tr>
<?php endforeach; ?>
          </table>
        </td>
      </tr>
    </table>
<?php endif; ?>
</font>


</body>
</html>
