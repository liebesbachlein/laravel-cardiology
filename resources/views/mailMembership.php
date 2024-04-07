<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=<device-width>, initial-scale=1.0">
    <title>Document</title>
    <style>
        .mail-line span {
            display: inline-flex;
            min-height: 40px;
            align-items: center;
            font-family: sans-serif;
        }
        .mail-line .title {
            display: inline-flex;
            width: 250px;
            font-weight: 600;
        }
        .span {
            color: black;
        }
    </style>
</head>
<body>
<div class="mail-box">
        <div class="mail-line">
            <span class="title">ФИО:</span>
            <span class="data">{{$data['last_name']}} {{$data['first_name']}} {{$data['patro_name']}}</span>
        </div>
        <div class="mail-line">
            <span class="title">Email:</span>
            <span class="data">{{$data['email']}}</span>
        </div>
        <div class="mail-line">
            <span class="title">Телефон:</span>
            <span class="data">{{$data['phone_number']}}</span>
        </div>
        <div class="mail-line">
            <span class="title">Дата рождения:</span>
            <span class="data">{{$data['date_birth']}}</span>
        </div>
        <div class="mail-line">
            <span class="title">Место рождения:</span>
            <span class="data">{{$data['place_birth']}}</span>
        </div>
        <div class="mail-line">
            <span class="title">Место проживания:</span>
            <span class="data">{{$data['address']}}</span>
        </div>
        <div class="mail-line">
            <span class="title">Номер уд/л-ти:</span>
            <span class="data">{{$data['id_doc']}}</span>
        </div>
        <div class="mail-line">
            <span class="title">Дата выдачи уд/л-ти:</span>
            <span class="data">{{$data['date_doc']}}</span>
        </div>
        <div class="mail-line">
            <span class="title">Место выдачи уд/л-ти:</span>
            <span class="data">{{$data['place_doc']}}</span>
        </div>
        <div class="mail-line">
            <span class="title">Образование:</span>
            <span class="data">{{$data['education']}}</span>
        </div>
        <div class="mail-line">
            <span class="title">Доп. образование:</span>
            <span class="data">{{$data['add_education']}}</span>
        </div>
        <div class="mail-line">
            <span class="title">Опыт работы:</span>
            <span class="data">{{$data['experience']}}</span>
        </div>
        <div class="mail-line">
            <span class="title">Интересы:</span>
            <span class="data">{{$data['interests']}}</span>
        </div>
        <div class="mail-line">
            <span class="title">Принять в общество с:</span>
            <span class="data">{{$data['date_member']}}</span>
        </div>
        <div class="mail-line">
            <span class="title">Условия приняты:</span>
            <span class="data">{{$data['terms']}}</span>
        </div>
</div>
</body>
</html>