<?php
    include('./Config/db.php');
    $resp = $db->query('SELECT * FROM Animals');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>uglyAnimals</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <h1>Ugly Animals <br> Gotta catch them all !</h1>

    <section>
        <h2>Liste des animaux</h2>
        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Résumé</th>
                    <th>Image</th>
                </tr>
            </thead>

            <tbody>
            <?php while ($data = $resp->fetch()) : ?>
                <tr>
                    <td><?php echo $data['name'] ?></td>
                    <td><?php echo $data['summary'] ?></td>
                    <td><img src="<?php echo $data['image'] ?>" alt="<?php echo $data['name'] ?>"></td>
                    <td> <a href="details.php?id=<?php echo $data['id'] ?>">Voir plus</a></td>
                </tr>
             <?php endwhile;
            $resp->closeCursor(); ?>
            </tbody>
        </table>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>