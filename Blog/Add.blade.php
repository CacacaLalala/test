<html >
<head>

    <meta charset="utf8">
</head>
<body>
<h1>
    请输入你想发表的内容
</h1>
@if (Route::has('login'))
    <div class="top-right links">
        @if (Auth::check())
            <a href="{{ url('/start') }}">Start</a>
        @else
            <a href="{{ url('/login') }}">Login</a>
            <a href="{{ url('/register') }}">Register</a>
        @endif
    </div>
@endif
<h1>  标题： </h1>
<form action="{{url('/article')}}" method="POST">
    {{csrf_field()}}
    <input name="title">
    <br>
    <h2> 内容：</h2>
    <textarea name="content" style="width:1000px;height:200px;background-color:#d9edf7;font-weight:bold;font-size:30px;font-family: 'Arial Narrow';">
    </textarea>
    <button type="submit">submit</button>
</form>
</body>
</html>