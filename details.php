<?php
include('./Config/db.php');
include('./template/nav.php');

$resp = $db->query('SELECT * FROM Animals WHERE id = ' . $_GET['id']);
$data = $resp->fetch();
if ($data === false) {
    header('Location: Template/error404.php');
    exit;
}
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
        <p><?php echo $data['Type']?></p>
        <p><?php echo $data['hp']?></p>
        <p><?php echo $data['pc']?></p>
        <a href="index.php">Retour à la liste</a>
    </div>
</body>

</html>