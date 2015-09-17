<!DOCTYPE html>
<html>
<html lang="ja">
<head>
      <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-MfvZlkHCEqatNoGiOXveE8FIwMzZg4W85qfrfIFBfYc= sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
      <style type="text/css">
        .main-picture img {
          width: 75%;
        }
        body {
          background-color: #fffacd;
        }
        .title {

        }
        .header {
          height: 20px;
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
        <h3>PenGumin           楽天クエスト</h3>
        <form method="GET" action="{{action('Auth\AuthController@getLogout')}}" accept-charset="UTF-8" class="logout text-right">
          <button type="submit" class="btn btn-danger">logout</button>
        </form>
      <div class="main-picture">
        <img src="http://www.fastpic.jp/images.php?file=9838842752.gif" class="img-responsive center-block" alt="logo">
      </div>
      <div class="container">
        @yield('body')
      </div>
    </body>

    <div>
      @yield('footer')
    </div>
</html>
