<?php
 include('Config/db.php');
 $resp = $db->query('SELECT * FROM Animals');
$errors= '';
if (
    $_POST &&
    isset($_POST['name']) && $_POST['name'] !== '' &&
    isset($_POST['summary']) && $_POST['summary'] !== '' 
  ) {

$fileName= $_FILES['image']['name'];
$fileExt = "." . strgtolower(substr(strrchr($fileName, "."), 1));

$tmpName = $_FILES['image']['tmp_name'];
$filePath= "img/" . $fileName . $fileExt;
$req= $db->prepare("INSERT INTO animals(name, summary, image) VALUES (:name, :summary, :image,)");
$req->execute([
    'name' => $_POST['name'],
    'summary' => $_POST['summary'],
    'image' => $_POST['image'],
    ]);
    header('Location : index.php');
    exit;
}

$fileSize = $_FILES['image']['size'];
$maxsize = 50000;
$validExt = array('.jpg', '.png', '.gif', '.jpeg');


$errors = '';
    if (isset($_POST['name']) && $_POST['name'] === '') {
      $errors .= 'Veuillez rentrer un nom ';
    }

    if (isset($_POST['summary']) && $_POST['summary'] === '') {
      $errors .= 'Veuillez rentrer une description. ';
    }
    if (isset($_POST['image']) && $_POST['image'] === '') {
        $errors .= 'Une image est requise. ';
      }
    if(!in_array($fileExt, $validExt)){
          $errors.= 'Le format de fichier n est pas valide';
      }
      if($fileSize > $maxsize){
          $errors.= 'La taille du fichier est trop volumineuse';
      }
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link href="./public/css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Exo:wght@500&family=Roboto+Flex:opsz@8..144&display=swap" rel="stylesheet"> 
</head>

<body>
<nav class="navbar fixed-top">
    <a href="index.php"><img src="./public/img/Ugly Animals.png"></a>
</nav>
    <?php 
        $user = 'root';
        $pass = 'root';
    ?>
<h1>Ajouter un animal moche</h1>
<form action ="" method="POST">
    Nom : <input type="text" name="name"/><br/>
    Description : <input type="text" name="summary"/><br/>
    Image : <input type="file" name="image"/><br/>
    <?php echo $errors ?>
    <input type="submit" value="Envoyer">
</form>
