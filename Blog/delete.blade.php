<html >
<head>

    <meta charset="utf8">
</head>
<body>
<form action="{{url('/article/')}}{{'/' . $id}}" method="POST">
    {{csrf_field()}}
    {{method_field('delete')}}
    <button type="submit">submit</button>
</form>
</body>
</html>