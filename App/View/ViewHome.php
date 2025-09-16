<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Violette Gilavert Reflexologie</title>
    <link rel="stylesheet" href="./public/style/reset.css">
    <link rel="stylesheet" href="./public/style/variables.css">
    <link rel="stylesheet" href="./public/style/fonts.css">
    <link rel="stylesheet" href="./public/style/style.css">
    <link rel="stylesheet" href="./public/style/queries.css">
    <!--favicon-->
    <link rel="icon" type="image/png" href="./public/image/favicon/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="./public/image/favicon/favicon.svg" />
    <link rel="shortcut icon" href="./public/image/favicon/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="/img/favicon/apple-touch-icon.png" />
    <link rel="manifest" href="./public/image/favicon/site.webmanifest" />
</head>

<body>
    <!--HEADER-->
    <header>
        <div class="container">
            <?php include __DIR__ . '/components/navbar.php'; ?>
            </div>
    </header>

    <!--main-->

    <main>
        <div class="container hero">
            <h1>RÉFLEXOLOGUE EI</h1>
            <h2>Méthode Sonia FISHMANN <sup>&reg;</sup></h2>
            <h3>RÉFLEXOLOGIE COMBINÉE</h3>
            <div class="pink_line"></div>
            <img src="./public/image/light_flower.png" alt="logo fleur violette opacité" id="light_flower">
            <img src="./public/image/light_flower.png" alt="logo fleur violette opacité" id="light_flower_2">
        </div>
        <section class="buttons">
            <a class="btn_reserver" href="<?= BASE_URL ?>/book">RÉSERVER UNE SÉANCE</a>
            <a class="savoir_plus" href="#">EN SAVOIR PLUS</a>
            <img id="arrow" src="./public/image/arrow.png" alt="">
        </section>

        <section class="articles">
            <article>
                <img id="flower_round" src="./public/image/flower_round.png" alt="image de fleur dans un rond">
                <h3>LA RÉFLEXOLOGIE:</h3>
                <div class="pink_line"></div>
                <p>La <strong>réflexologie</strong> est une technique de soin pratiquées sur des <em>"zones
                        réflexes"</em> qui consiste à
                    effectuer des pressions sur des points précis de ces zones, de manière à agir sur différentes
                    parties du corps, afin d'optimiser les effets du <em>bien-etre</em> et améliorer la qualité de vie
                    du
                    quotidien.</p></br>
                <a href="#">
                    <p>En savoir plus...</p>
                </a>
            </article>
            <article>
                <img id="flower_round" src="./public/image/flower_round.png" alt="image de fleur dans un rond">
                <h3>DÉROULEMENT D’UNE SÉANCE:</h3>
                <div class="pink_line"></div>
                <p>Les séances se déroulent en 60 minutes,
                    J’accueille et j’élabore mon <em>recueil d’informations</em>, je prend note devant mon bénéficiaire
                    en lui
                    posant des questions.
                    Vous venez pour une raison particulière?
                    J’évalue les tensions physiques et / ou émotionnelles avec l’échelle numérique (EN de 0 à 10).
                    Connaissez-vous la réflexologie?
                    J’explique la réflexologie et la méthode <strong>Sonia Fischmann®</strong> en expliquant le ressenti
                    “petite
                    aiguille” du détecteur manuel, j’adopte une communication positive.
                    Je note les priorités sur mon recueil d’information et le secondaire pour les séances suivantes...
                </p></br>
                <a href="#">
                    <p>En savoir plus...</p>
                </a>
            </article>
        </section>
    </main>
    <footer>
       <?php include __DIR__ . '/components/footer.php'; ?>
    </footer>

</body>

</html>