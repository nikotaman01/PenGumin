<!DOCTYPE html>
<html>
<html lang="ja">
    <head>
      <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-MfvZlkHCEqatNoGiOXveE8FIwMzZg4W85qfrfIFBfYc= sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
      @yield('meta')
        <title>
            @yield('title')
        </title>
    </head>
    <body>
        @yield('body')
    </body>

    <div>
      @yield('footer')
    </div>
</html>
