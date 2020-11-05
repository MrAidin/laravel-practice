<!DOCTYPE html>
<html dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body style="text-align: right">
<div class="container">
    @yield('content')
</div>
<div class="container">
    @yield('footer')
</div>
</body>
<script src="{{asset('js/app.js')}}"></script>

</html>
