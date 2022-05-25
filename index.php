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
        <div id="contenant" class="d-flex flex-row flex-wrap justify-content-center">
            <?php while ($data = $resp->fetch()) :  
                $id= $data['id'];
            ?>
            <div class="card" style="width: 18rem;">
                <img src="<?php echo $data['image'] ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $data['name'] ?></h5>
                    <p class="card-text"><?php echo substr($data['summary'], 0, 300) ;?></p>
                    <div class=" flex-row align-items-center " style="display:flex;width:90%;margin-left:5%;justify-content:space-between; align-self:flex-end">
                        <a href="details.php?id=<?php echo $id ?>" class="btn btn-primary rounded-pill">Voir plus</a>
                        <a data-toggle="modal" data-target="#exampleModal" href="#exampleModal">
                            <img src="./public/img/Delete.svg"/>
                        </a>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Éradiquer l'espèce</h5>
                        </div>
                        <div class="modal-body">
                            <p>Êtes-vous sûrs de vouloir mettre fin à cette prodigieuse oeuvre de la nature qui a réussi à survivre toutes ces années malgré son apparente dysfonctionnalité ?</p>
                        </div>
                        <div class="modal-footer">
                            <a class="btn btn-primary" href="delete.php?id=<?php echo $id ?>">Eradiquer</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endwhile;
            $resp->closeCursor(); ?>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
