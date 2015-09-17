<!DOCTYPE html>
<html>
<html lang="ja">
<head>
      <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-MfvZlkHCEqatNoGiOXveE8FIwMzZg4W85qfrfIFBfYc= sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
      <style type="text/css">
        .main-picture img {
          width: 100%;
        }
        body {
          background-color: #fffacd;
        }
        .title {

        }
        .header {
          margin: 0;
          padding: 0;
          position: fixed;
          z-index: 100;
          top: 0px;
          left: 0px;
          width: 100%;
          height: 40px;
          color: white;
          background-color: #DC143C;
        }
        .footer {
          margin: 0;
          padding: 0;
          position: fixed;
          z-index: 100;
          bottom: 0px;
          left: 0px;
          width: 100%;
          height: 30px;
          color: white;
          background-color: #DC143C;
          text-align: center;
        }
        .pengmin {
          text-align: left;
          vertical-align: top;
        }
        span.rakuten {
          left: 500px;

        }

      </style>
      <meta charset="UTF-8">
      <meta name="keywords" content="楽天,PenGumin">
      <meta name="author" content="PenGumin">
        <title>
            @yield('title')
        </title>
    </head>
    <body>
      <div class="header">
        <div class="pengumin col-md-1"><h4>PenGumin</h4></div>
        <div class="rakuten col-md-3"><h4>楽天クエスト</h4></div>
        <div class="mypage col-md-offset-6 col-md-1">
          <form method="GET" action="{{action('MypageController@index')}}" accept-charset="UTF-8">
            <button type="submit" class="btn btn-success">MyPage</button>
          </form>
        </div>
        <div class="logout col-md-1">
          <form method="GET" action="{{action('Auth\AuthController@getLogout')}}" accept-charset="UTF-8" class="logout">
            <button type="submit" class="btn btn-info">Logout</button>
          </form>
        </div>
      </div>
      <div class="main-picture">
        <img src="http://www.fastpic.jp/images.php?file=9838842752.gif" class="img-responsive center-block" alt="logo">
      </div>
      <div class="container">
        @yield('body')
      </div>
      <div class="footer">
        <div class="mess">
          <h5>Copyright © 2015 PenGumin All Rights Reserved.</h5>
        </div>
      </div>
    </body>

</html>
