<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Page</title>
</head>
<body>
{{--
    @php
        echo url('/shaon');
    @endphp --}}
    {{-- @for($i=1; $i<=10; $i++)
        <p>{{ $i }} Hellow</p>

    @endfor --}}
    <a href="{{ url('contact') }}" target="_blank">Contact</a>
    <a href="{{ url('/') }}" target="_blank">Home</a>


<h1>This is about page</h1>
</body>
</html>
