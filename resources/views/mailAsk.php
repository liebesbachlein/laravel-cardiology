<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=<device-width>, initial-scale=1.0">
    <title>Document</title>
    <style>
        .mail-box div:nth-child(even) {
            background-color: gainsboro;
        }
        .mail-line span {
            display: inline-flex;
            height: 40px;
            align-items: center;
            font-family: sans-serif;
        }
        .mail-line .title {
            display: inline-flex;
            width: 250px;
            font-weight: 600;
        }
    </style>
</head>
<body>
<div class="mail-box">
        <div class="mail-line">
            <span class="title">ФИО:</span>
            <span class="data">{{$data['name']}}</span>
        </div>
        <div class="mail-line">
            <span class="title">Email:</span>
            <span class="data">{{$data['email']}}</span>
        </div>
        <div class="mail-line">
            <span class="title">Обращение:</span>
            <span class="data">{{$data['content']}}</span>
        </div>
</div>
</body>
</html>