<!DOCTYPE html>
<html>
<html lang="ja">
<head>
      <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-MfvZlkHCEqatNoGiOXveE8FIwMzZg4W85qfrfIFBfYc= sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
      <meta charset="UTF-8">
      <meta name="keywords" content="楽天,PenGumin">
      <meta name="author" content="PenGumin">
        <title>
            @yield('title')
        </title>
    </head>
    <body>
      <div class="main_picture jumbotron">
        <div class="container">
          <img src="http://blogs.c.yimg.jp/res/blog-a4-21/chi_hiro_0926/folder/1800910/19/64137619/img_1?1316741771" class="img-responsive center-block" alt="logo" style="height:200px;">
        </div>
      </div>
      <div class="container bg-warning">
        @yield('body')
      </div>
    </body>

    <div>
      @yield('footer')
    </div>
</html>
