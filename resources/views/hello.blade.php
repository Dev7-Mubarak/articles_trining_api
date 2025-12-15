<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Hello, World! {{ $name }}</h1>
    @if ($value > 20)
    <div style="color: red;">
        The value is greater than 20.
    </div>
    @endif

    @for ($i = 0; $i < 10; $i++)
    <h4>{{ $i }}</h4>
    @endfor
</body>
</html>
