<?php
    include('./Config/db.php');
    include('./template/nav.php');
    $resp = $db->query('SELECT * FROM Animals');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> uglyAnimals </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="./public/css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Exo:wght@500&family=Roboto+Flex:opsz@8..144&display=swap" rel="stylesheet"> 
</head>
<body>

    <section>
        <h1>Liste des animaux</h1>
        <div id="contenant" class="d-flex flex-wrap justify-content-center">
            <?php while ($data = $resp->fetch()) :  ?>
            <div class="card" style="width: 18rem;">
                <img src="<?php echo $data['image'] ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $data['name'] ?></h5>
                    <p class="card-text"><?php echo substr($data['summary'], 0, 275) ;?></p>
                    <a href="details.php?id=<?php echo $data['id'] ?>" class="btn btn-primary rounded-pill">Voir plus</a>
                    <button type="button" data-toggle="modal" data-target="#exampleModal">
                    <img src="./public/img/Delete.svg">
                    </button>
                </div>
            </div>
            <?php endwhile;
            $resp->closeCursor(); ?>
        </div>
    </section>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Supprimer cet animal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Êtes-vous sûr de vouloir éradiquer cette pauvre espèce ? Toute suppression est définitive et impacte gravement l'écosystème local.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                <a href="delete.php?id=<?php echo $data['id'] ?>" class="btn ">Supprimer</a>
            </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
