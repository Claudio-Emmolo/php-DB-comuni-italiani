<?php
// Import All DB
@include __DIR__ . '/get-data.php';



// Get Clicked "Comune" Data
$getComune = $_GET['comuneClicked'];
foreach ($comuniList as $comune) {
    if ($comune["nome"] == $getComune) {
        $comuneData = $comune;
    }
}

// Get imgs with pixabay
$getImg = json_decode(file_get_contents('https://pixabay.com/api/?key=15364847-b38baf2394cc72169bdb5f288&q=' . strtolower($comuneData['provincia']['nome']) . ' city&image_type=photo&safesearch=true&pretty=true'), true);
$cityImgList = $getImg['hits'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo ($comune) ?></title>
    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!-- STYLES -->
    <link rel="stylesheet" href="./style/singlepage.css">
    <link rel="stylesheet" href="./style/general.css">
    <link rel="stylesheet" href="./style/footer.css">
</head>

<body>

    <main>
        <div class="container-fluid">
            <!-- JUMBO -->
            <section id="jumbo" class="py-5">
                <h1 class="text-center text-uppercase fw-bold">
                    <?php echo ($comuneData['nome']) ?>
                </h1>
            </section>

            <hr>

            <div class="row">
                <!-- LEFT SECTION -->
                <div class="col-12 col-md-6 px-5">

                    <!-- DETAILS -->
                    <section id="details">
                        <p class="mt-3">
                            <span class="fs-3">
                                Dettagli:
                            </span>
                        <ul>
                            <li>
                                <span class="fw-bold">Zona: </span>
                                <?php echo ($comuneData['zona']['nome']) ?>
                            </li>
                            <li>
                                <span class="fw-bold">Regione: </span>
                                <?php echo ($comuneData['regione']['nome']) ?>
                            </li>
                            <li>
                                <span class="fw-bold">Provincia: </span>
                                <?php echo ($comuneData['provincia']['nome']) ?>
                                (<?php echo ($comuneData['sigla']) ?>)

                            </li>
                            <li>
                                <span class="fw-bold">CAP: </span>
                                <?php echo ($comuneData['cap'][0]) ?>
                            </li>
                            <li>
                                <span class="fw-bold">Codice Catastale: </span>
                                <?php echo ($comuneData['codiceCatastale']) ?>
                            </li>
                            <li>
                                <span class="fw-bold">Popolazione: </span>
                                <?php echo ($comuneData['popolazione']) ?>
                            </li>
                        </ul>
                        </p>
                    </section>

                    <!-- WIKIPEDIA -->
                    <section id="wikipedia" class="my-3">
                        <h3>Secondo Wikipedia:</h3>
                        <iframe src="https://it.m.wikipedia.org/wiki/<?php echo ($comuneData['nome']) ?>"
                            frameborder="10" class="w-100 wiki-iframe"></iframe>
                    </section>
                </div>

                <!-- RIGHT SECTION -->
                <section id="photo-gallery" class="col-12 col-md-6 px-5">
                    <!-- PHOTO GALLERY -->
                    <h3 class="text-center">
                        Immagini relative a <?php echo ($comuneData['provincia']['nome']) ?>*
                    </h3>
                    <p class="text-center p-0 m-0 message-img my-2">
                        Le immagini vengono generate randomicamente da una ricerca online, pertanto i risultati
                        potrebbero essere fuori contesto e/o fuori luogo.
                    </p>
                    <?php
                    foreach (array_slice($cityImgList, 0, 5) as $cityImg) {
                    ?>
                    <div class="d-flex flex-column align-items-center">
                        <img src="<?php echo ($cityImg['webformatURL']) ?>"
                            alt="<?php echo ($comuneData['provincia']['nome']) ?> City Img's"
                            class="mb-2 img-fluid w-100">
                    </div>
                    <?php
                    }
                    ?>
                </section>
            </div>

        </div>
    </main>
    <?php
    @include __DIR__ . '/footer.php';
    ?>
</body>

</html>