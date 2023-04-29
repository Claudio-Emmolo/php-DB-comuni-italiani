<?php
@include __DIR__ . '/get-data.php';

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
    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="./script/script.js"></script>
    <!-- STYLES -->
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="./style/general.css">
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
        <h2 class="text-center text-uppercase">Lista Completa</h2>


        <!-- SET FILTER -->
        <section class="search-form">
            <form action="./index.php" method="GET">
                <!-- COMUNE -->
                <input type="text" name="search" placeholder=" <?php if (strlen($filter) > 0) {
                                                                    echo ($filter);
                                                                } else {
                                                                    echo ('Cerca per nome');
                                                                }
                                                                ?>">
                <!-- PROVINCIA -->
                <input type=" text" name="provincia" value="" placeholder="<?php
                                                                            if (strlen($filterProvincia) > 0) {
                                                                                echo (trim($filterProvincia));
                                                                            } else {
                                                                                echo (trim('Cerca per provincia'));
                                                                            }
                                                                            ?>">
                <button class="btn btn-primary">Cerca</button>
            </form>
        </section>


        <!-- REMOVE FILTER -->
        <?php
        if (strlen($filterProvincia) > 0 || strlen($filter) > 0) {
        ?>
            <section class="search-form">
                <form action="./index.php" method="GET">
                    <input type="text" name="search" value="" hidden>
                    <input type="text" name="provincia" value="" hidden>
                    <button class="btn btn-primary btn btn-danger">Cancella Filtri</button>
                </form>
            </section>
        <?php } ?>

        <!-- GENERATE TABLE -->
        <table class="table table-hover table-bordered">

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
                                    <!-- Comune Single Details Page -->
                                    <form action="./comune-details.php" method="GET">
                                        <input type="text" name="comuneClicked" value="<?php echo ($comuni['nome']) ?>" hidden>
                                        <button>
                                            View
                                        </button>
                                    </form>

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
</body>

</html>