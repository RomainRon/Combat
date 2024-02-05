<?php 

include_once './config/connexion.php';
include_once './config/autoload.php';

$heroManager = new HeroesManager($connexion);
if (!empty($_POST['name'])) {


    $hero = new Hero($_POST['name'], 100);


    $heroManager->add($hero);

    
    
}
$heroes = $heroManager->findAllAlive();



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
    <section class="row m-5 d-flex flex-wrap justify-content-center">
        <form action="" class="d-flex flex-column align-items-center" method="post">
            <label for="" class="m-2"> Créer un héro</label>
            <input type="text" class="m-2" name="name" placeholder="Nom du hero">
            <button class="btn btn-danger" type="submit"> Créer le hero</button>
        </form>
    </section>


    <section class="container d-flex flex-wrap justify-content-center">

    <?php foreach ($heroes as $hero) { ?>
        <div class="card m-2 d-flex" style="width: 18rem;">
            <img src="./images/ken-kaneki-tokyo-ghoul-son-masque-noir-original_675932-440.avif" class="card-img-top w-75 mx-auto" alt="...">
            <div class="card-body">
                <h5 class="card-title text-center m-2"><?= $hero->getName() ?></h5>

                <div class="progress m-2" role="progressbar" aria-label="Danger example" aria-valuenow="<?= $hero->getHp() ?>" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-bar bg-danger" style="width: <?= $hero->getHp() ?>%"><?= $hero->getHp() ?>%</div>
                </div>
                <div class="w-100 d-flex justify-content-center">
                    <a href="./fight.php?hero_id=<?=$hero->getId()?>" class="btn btn-success m-2">Choisir</a>
                </div>
            </div>
        </div>

    <?php } ?>

    </section>


    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>