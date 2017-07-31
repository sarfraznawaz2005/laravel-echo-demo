<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="/css/app.css">

    <style>
        body {
            margin: 50px;
        }
    </style>

    <title>Laravel</title>
</head>
<body id="app">
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
            <div align="center">
                <button id="btn_send_event" class="btn btn-primary">Send Event</button>
            </div>
        </div>
    </div>
</div>

<script src="{{ Request::isSecure() ? 'https://':'http://' }}{{ Request::getHost() }}:6001/socket.io/socket.io.js"></script>

<script src="/js/app.js"></script>
<script src="/js/echo.js"></script>
<script>
    $('#btn_send_event').click(function () {
        $.get('/sendevent');
    });

    // laravel echo code
    if (typeof io !== 'undefined') {

        Echo = new Echo({
            broadcaster: 'socket.io',
            host: window.location.hostname + ':6001'
        });

        Echo.channel('notification').listen('MyEvent', (data) => {
            console.log(data);

            alert("Message Received:\n\n" + data.message);
        });

    }

</script>


</body>
</html>
