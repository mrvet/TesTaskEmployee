<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <script src="/js/app.js" ></script>


    <link href="{{ asset('css/all.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script src="/js/myScripts.js"></script>
    {{--https://github.com/jonmiles/bootstrap-treeview--}}
</head>
<body>

<div class="container">

    <div class="row justify-content-center">

        @if( $employee )

            <form class="col-lg-6 col-sm-10 col-xs-12 col-md-8">
                <div class="form-group">
                    <label for="exampleInputEmail1">Имя</label>
                    <input class="form-control" placeholder="Имя" value="{{$employee['FirstName']}}">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Фамилия</label>
                    <input class="form-control" placeholder="Имя" value="{{$employee['SecondName']}}">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Отчество</label>
                    <input class="form-control" placeholder="Имя" value="{{$employee['LastName']}}">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Должность</label>
                    <input class="form-control" placeholder="Должность" value="{{$employee['position']['PositionTitle']}}" >
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Начальник: </label>

                    @if( $employee['boss'] )

                        <input
                                class="form-control"
                                placeholder="Должность"
                                value="{{$employee['boss']['FirstName']}} {{$employee['boss']['SecondName']}}"
                        >
                    @else
                        <label for="exampleInputPassword1">не назначен!</label>

                    @endif

                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        @else
            <h3>Employee not found!</h3>
        @endif

    </div>

</div>