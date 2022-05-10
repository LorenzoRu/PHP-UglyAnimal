<?php
include('./Config/db.php');
$resp = $db->query('SELECT * FROM Animals WHERE id = ' . $_GET['id']);
$data = $resp->fetch();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1><?php echo $data['name'] ?> </h1>
    <img src="<?php echo $data['image'] ?>" alt="<?php echo $data['name'] ?>">
    <p><?php echo $data['summary'] ?></p>
    <a href="index.php">Retour à la liste</a>
</body>

</html>