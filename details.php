<?php
include('./Config/db.php');
include('./template/nav.php');

$resp = $db->query('SELECT * FROM Animals WHERE id = ' . $_GET['id']);
$respTest = $db->query('SELECT * FROM Animals INNER JOIN Stats WHERE Animals.id = Stats.animal_id AND id =' . $_GET['id']);
$data = $respTest->fetch();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="./public/css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Exo:wght@500&family=Roboto+Flex:opsz@8..144&display=swap" rel="stylesheet"> 
    <title> Uglymon : <?php echo $data['name']?> </title>
</head>

<body>
    <img class="imgcouverturedetail" src="<?php echo $data['image'] ?>" alt="<?php echo $data['name'] ?>">
    <div id="contenantdescription">
        <h1><?php echo $data['name'] ?> </h1>
        <p><?php echo $data['summary'] ?></p>
        <span><?php echo $data['type']?></span>
        <span><?php echo $data['level']?></span>
        <span><?php echo $data['HP']?></span>
        <span><?php echo $data['PC']?></span>
        <a href="index.php">Retour à la liste</a>
    </div>
</body>

</html>