<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>Staff</title>
        <!-- Bootstrap読み込み -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <!-- jQueryの読み込み -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- JavaScriptファイル読み込み -->
        <script src="{{{asset('/js/staff-list.js')}}}" type="text/javascript" charset="utf-8"></script>
    </head>
    <body>
        <div class="container">
        @yield('content')
        </div>
        <!-- BootstrapのJsの読み込み -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </body>
</html>