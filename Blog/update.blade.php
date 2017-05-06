<html >
<head>

    <meta charset="utf8">
</head>
<body>
<form action="{{url('/article/')}}{{'/' . $id}}" method="POST">
    {{csrf_field()}}
    {{method_field('put')}}
    <textarea name="content">
    </textarea>
    <button type="submit">submit</button>
</form>
</body>
</html>