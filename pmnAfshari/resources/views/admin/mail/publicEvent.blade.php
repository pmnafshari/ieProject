<!doctype html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>تبریک !</title>
</head>
<body>

<h2>
    {{$text}}
</h2>

<h4>
    این تخفیف تا تاریخ     {{jdate($end_date) ->format('%d / %B / %Y')}}
    اعتبار دارد

</h4>

</body>
</html>
