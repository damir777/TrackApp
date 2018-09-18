<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TrackApp</title>

    {{ HTML::style('css/bootstrap.min.css') }}
    {{ HTML::style('font-awesome/css/font-awesome.min.css') }}
    {{ HTML::style('css/style.min.css') }}

    {{ HTML::script('js/jquery-3.1.1.min.js') }}
    {{ HTML::script('js/bootstrap.min.js') }}

    {{ HTML::script('js/visits.js') }}
</head>
<body class="gray-bg">

<div class="middle-box text-center loginscreen">
    <div>
        <h2>TrackApp Homepage</h2>
    </div>
    <div class="text-center m-t-lg">
        <a href="{{ route('GetUsers') }}">Users</a>
    </div>
</div>

</body>
</html>