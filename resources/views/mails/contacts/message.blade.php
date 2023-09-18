<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            font-family: 'Verdana', 'sans-serif';
            background-color: bisque;
        }

        .container {
            text-align: center;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>E' stato inviato un nuovo messaggio</h1>
        <p>{{ $content }}</p>
    </div>
</body>

</html>
