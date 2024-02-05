<?php

include_once './config/connexion.php';
include_once './config/autoload.php';

$heroManager = new HeroesManager($connexion);
$hero = $heroManager->find($_GET['hero_id']);


$fightManager = new FightManager();
$monster = $fightManager->createMonster();

$resultFight = $fightManager->fight($hero, $monster)



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Combat</title>
</head>

<body class="body">

    <section class="container d-flex flex-wrap justify-content-center">

        <div class="card m-2 d-flex" style="width: 18rem;">
            <img src="images/ken-kaneki-tokyo-ghoul-son-masque-noir-original_675932-440.avif"card-img-top w-75 mx-auto" alt="...">
            <div class="card-body">
                <h5 class="card-title text-center m-2"><?= $hero->getName() ?></h5>
                <p class="text-center m-0"><?= $hero->getHp() ?> pv</p>
                <div class="progress m-2" role="progressbar" aria-label="Danger example" aria-valuenow="<?= $hero->getHp() ?>" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-bar bg-danger" style="width: <?= $hero->getHp() ?>%"></div>
                </div>
            </div>
        </div>

        <h1>VS</h1>

        <div class="card m-2 d-flex" style="width: 18rem;">
            <img src="./images/jason _yamori.jpeg" class="card-img-top w-100 h-100  mx-auto" alt="...">
            <div class="card-body">
                <h5 class="card-title text-center m-2"><?= $monster->getName() ?></h5>
                <p class="text-center m-0"><?= $monster->getHp() ?> pv</p>
                <div class="progress m-2" role="progressbar" aria-label="Danger example" aria-valuenow="<?= $monster->getHp() ?>" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-bar bg-danger" style="width: <?= $monster->getHp() ?>%"></div>
                </div>
            </div>
        </div>

    </section>

    <section class="container">

        <?php foreach ($resultFight as $key => $message) { ?>
            <div class="m-0 alert alert-<?= $key % 2 ? 'primary' : 'danger' ?>" role="alert">
                <?= $message ?>
            </div>
        <?php } ?>
    </section>
<section class="row m-5 d-flex flex-wrap justify-content-center">
<a href ="./index.php" class="btn btn-light" h-25 >Accueil</button>
</section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>