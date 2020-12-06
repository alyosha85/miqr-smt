<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LabelDrücken</title>
    <style>

        .print {

            }
        span {

            }
    </style>
</head>
<body>
    <div>
        <h1>Heute am {{$items->ausdat}} wurde folgendes Gerät ausgemustert:</h1>
        <br>
        <br>
        <p>Inv.-Nummer: {{$items->invnr}}</p>
        <p>Geräteart: {{$items->garts->name}}</p>
        <p>Gerätename: {{$items->gname}}</p>
        <p>Seriennummer: {{$items->sn}}</p>
        <p>Letzter Standort: {{$items->location->address}}, &nbsp;  Raum: {{$room}} </p>
        <br>
        <p>Grund der Ausmusterung: {{$items->amgs->name}}</p>
        <br>
        <p>Unterschrift:</p>
    </div>


    <script>
        print();
        setTimeout("closePrintView()", 3000);
        function closePrintView() {
            document.location.href ='/inventory';
        }
    </script>
</body>
</html>
