<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

</head>
<body>

    <div class="container">
        {{--<h2>{{count($bossArray)}}</h2>--}}
        @foreach ($bossArray as $boss)
            <p>
                {{ $boss->FirstName }}
                {{ $boss->SecondName }}
                {{ $boss->LastName }}
                ( {{ $boss->position->PositionTitle }} )
            </p>
        @endforeach

    </div>


</body>
</html>
