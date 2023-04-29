<?php

// GET API BY: https://github.com/matteocontrini/comuni-json
$getComuni = file_get_contents('https://raw.githubusercontent.com/matteocontrini/comuni-json/master/comuni.json');

$comuniList = json_decode($getComuni, true);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comuni Italiani</title>
    <link rel="stylesheet" href="./style/style.css">
</head>

<body>
    <section id="jumbo">
        <div class="jumbo-container">
            <h1>
                Database Comuni Italiani
            </h1>
        </div>
    </section>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="./script/script.js"></script>
</body>

</html>