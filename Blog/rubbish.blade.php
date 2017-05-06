@extends('layouts.app')
        <!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-COMPATIBLE" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Your Blog Page</title>
</head>
<body>
<div class="jumbotron">
    <div class="container">
        <h2>Your Blog Page</h2>
    </div>
</div>

<!-- 自定义区域 -->
<div class="panel panel-default">
    <div class="panel-heading">Posted</div>
    @foreach($articles as $article)

        <p1>{{$article->title}}</p1>
        <p2>{{$article->updated_at}}</p2>
        <p3>{{$article->content}}</p3>

        <a href="{{url('/article/look')}}">查看</a>
        <a href="{{url('/article/change')}}">修改</a>
        <a href="{{url('/article/delete')}}">删除</a>
        <br>
    @endforeach

</div>
<div class="panel panel-default">
    <div class="panel-heading">Post</div>
    <a href="{{url('/article')}}">写帖子</a>
</div>
</body>