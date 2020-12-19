<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inventarergebnis</title>
    <style>
        body {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
            background-color: #FAFAFA;
            font: 12pt "Tahoma";
        }
        * {
            box-sizing: border-box;
            -moz-box-sizing: border-box;
        }
        .page {
            width: 210mm;
            min-height: 297mm;
            padding: 20mm;
            margin: 10mm auto;
            border: 1px #D3D3D3 solid;
            border-radius: 5px;
            background: white;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        @page {
            size: A4;
            margin: 0;
        }
        @media print {
            html, body {
                width: 210mm;
                height: 297mm;
            }
            .page {
                margin: 0;
                border: initial;
                border-radius: initial;
                width: initial;
                min-height: initial;
                box-shadow: initial;
                background: initial;
                page-break-after: always;
            }
        }
    </style>
</head>
<body>
    <div class="book">
        <div class="page">
            <p><span style='color: rgb(0, 0, 0); font-family: "Times New Roman"; font-size: medium; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;'>Inventarliste </span>&nbsp;</p>
<p><br></p>
<p style="text-align: right;">Stand:Date<strong></strong></p>
<p><strong>Inventar-Soll / Ist</strong>:</p>
<table style="width: 100%;">
    <thead>
        <tr>
            <td style="width: 33.3333%;">
                <div style="text-align: center;">Inventarnummer</div>
            </td>
            <td style="width: 33.3333%;">
                <div style="text-align: center;">Gerätename</div>
            </td>
            <td style="width: 33.3333%;">
                <div style="text-align: center;">Vorhanden</div>
            </td>
        </tr>
    </thead>
    <tbody>
        @foreach($val as $item)
        <tr>
            <td style="width: 33.3333%;"><br>{{$item['invnr']}}</td>
            <td style="width: 33.3333%;"><br>Hardcode</td>
            <td style="width: 33.3333%;"><br>Hardcode</td>
        </tr>
        @endforeach
    </tbody>
</table>
<p><strong>Neues Inventar</strong></p>
<table style="width: 100%;">
    <tbody>
        <tr>
            <td style="width: 33.3333%;">
                <div style="text-align: center;">Inventarnummer</div>
            </td>
            <td style="width: 33.3333%;">
                <div style="text-align: center;">Gerätename</div>
            </td>
            <td style="width: 33.3333%;">
                <div style="text-align: center;">Bisheriger Standort</div>
            </td>
        </tr>
        <tr>
            <td style="width: 33.3333%;"><br></td>
            <td style="width: 33.3333%;"><br></td>
            <td style="width: 33.3333%;"><br></td>
        </tr>
    </tbody>
</table>
<p><strong>Fehlendes Inventar</strong></p>
<table style="width: 100%;">
    <tbody>
        <tr>
            <td style="width: 33.3333%;">
                <div style="text-align: center;">Inventarnummer</div>
            </td>
            <td style="width: 33.3333%;">
                <div style="text-align: center;">Gerätename</div>
            </td>
            <td style="width: 33.3333%;">
                <div style="text-align: center;">Abgang (Grund)</div>
            </td>
        </tr>
        <tr>
            <td style="width: 33.3333%;"><br></td>
            <td style="width: 33.3333%;"><br></td>
            <td style="width: 33.3333%;"><br></td>
        </tr>
    </tbody>
</table>
<p><br></p>
<p>Unterschrift</p>
<p><br></p>
<hr>
<p><br></p>
<p><br></p>
<p><br></p>
<p><br></p>


        </div>
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
