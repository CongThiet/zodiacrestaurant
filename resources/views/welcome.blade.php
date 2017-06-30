<!DOCTYPE html>
<html>
<head>
    <title>2</title>
</head>
<body>
    <ul>
            @foreach($tasks as $value)
                <li>{{$value->name}} </li>
            @endforeach
    </ul>
</body>
</html>