<?php

// GET API BY: https://github.com/matteocontrini/comuni-json
$getComuni = file_get_contents('https://raw.githubusercontent.com/matteocontrini/comuni-json/master/comuni.json');

$comuniList = json_decode($getComuni, true);

$filter = $_GET['search'];
$filterProvincia = $_GET['provincia'];

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

    <section id="table-db" class="my-5">
        <table class="table table-hover table-bordered">
            <h2 class="text-center text-uppercase">Lista Completa</h2>

            <form action="./index.php" method="GET">
                <input type="text" name="search" placeholder="Cerca per nome">
                <input type="text" name="provincia" placeholder="Cerca per provincia">
                <button class="btn btn-primary">Cerca</button>
            </form>

            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Comune</th>
                    <th scope="col">Provincia</th>
                    <th scope="col">Mostra</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($comuniList as $comuni) {
                    if (str_contains(strtolower($comuni['nome']), strtolower($filter))) {
                        if (str_contains(strtolower($comuni['provincia']['nome']), strtolower($filterProvincia))) {
                ?>
                            <tr>
                                <td><?php echo ($comuni['codice']) ?></td>
                                <td><?php echo ($comuni['nome']) ?></td>
                                <td><?php echo ($comuni['provincia']['nome']) ?></td>
                                <td>
                                    <a href="">
                                        View
                                    </a>
                                </td>
                            </tr>
                <?php
                        }
                    }
                }
                ?>
            </tbody>
        </table>
    </section>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="./script/script.js"></script>
</body>

</html>