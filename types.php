<?php
    include('./Config/db.php');
    include('./template/nav.php');
    $resp = $db->query('SELECT * FROM Types');
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
    <table class="table table-hover table-responsive{-md}" id="tableautypes" style="width:80vw; margin-left:10vw;margin-top:10vh;">
        <thead>
            <tr>
                <th>Type</th>
                <th>Force</th>
                <th>Faiblesse</th>
                <th>Affinité</th>
                <th>Types ennemis</th>
            </tr>
        </thead>
        <tbody>
                <?php while($data = $resp->fetch()) : ?>
                <tr>
                    <td><?php echo $data['type']; ?></td>
                    <td><?php echo $data['strenth']; ?></td>
                    <td><?php echo $data['weakness']; ?></td>
                    <td><?php echo $data['affinity']; ?></td>
                    <td><?php echo $data['enemy']; ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
</body>
</html>