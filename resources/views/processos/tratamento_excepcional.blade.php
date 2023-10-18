

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="color blue">
        <form action="{{route('tratamento.store')}}" method="post">
            <label for="">submeta o pdf</label>
            <input type="file" name="doc_tratamento" id="doc_tratamento">
            <a href="http://"> <button type="submit"> Enviar</button></a>
        </form>
    </div>
</body>
</html>
