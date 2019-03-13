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
    <script defer src="js/main.js"></script>

</head>
<body>

<div class="container">

    <div class="row justify-content-center">

        <table class="table">
            <thead>
            <tr>
                <th class="orderBy" data-order-type="asc" data-column="id" style="cursor: pointer" scope="col">#(asc)</th>
                <th class="orderBy" scope="col" data-order-type="asc" data-column="FirstName" >First</th>
                <th class="orderBy" scope="col" data-order-type="asc" data-column="SecondName" >Second</th>
                <th class="orderBy" scope="col" data-order-type="asc" data-column="LastName" scope="col">Last</th>
                <th class="orderBy" scope="col" data-order-type="asc" data-column="position">Position</th>
                <th class="orderBy" scope="col" data-order-type="asc" data-column="boss" scope="col">Boss</th>
            </tr>
            </thead>
            <tbody id="employeesTable">

            @foreach( $employes as $employee )

                <tr>
                    <th scope="row">
                        <a target="_blank" href="/employee/{{$employee['id']}}">
                            {{$employee['id']}}
                        </a>
                    </th>
                    <th scope="row">{{$employee['FirstName']}}</th>
                    <th scope="row">{{$employee['SecondName']}}</th>
                    <th scope="row">{{$employee['LastName']}}</th>
                    <th scope="row">{{$employee['position']['PositionTitle']}}</th>
                    <th scope="row">
                        <a target="_blank" href="/employee/{{$employee['boss']['id']}}">
                            {{$employee['boss']['FirstName']}}
                            {{$employee['boss']['SecondName']}}
                        </a>
                    </th>
                </tr>

            @endforeach

            </tbody>
        </table>

        <div id="GetMoreEmployees" class="btn btn-primary" >More</div>


    </div>

</div>

</body>