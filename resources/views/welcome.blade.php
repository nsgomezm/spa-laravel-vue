<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.1.1/css/buttons.bootstrap5.css"/>

        <title>Laravel</title>
    </head>
    <body class="">
        <div id="app"></div>
    </body>
    <script src="https://kit.fontawesome.com/d10f5f87f4.js" crossorigin="anonymous"></script>

    <script src="{{ mix('/js/app.js') }}"></script>

</html>
