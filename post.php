<?php
 include('Config/db.php');
 include('template/nav.php');
 $resp = $db->query('SELECT * FROM Animals');
 
$errors= '';
if (
    $_POST &&
    isset($_POST['name']) && $_POST['name'] !== '' &&
    isset($_POST['summary']) && $_POST['summary'] !== '' &&
    isset($_POST['file']) && $_POST['file'] !== '' 
    
  ) {

$file = rand(1000,100000)."-".$_FILES['file']['name'];
$file_loc = $_FILES['file']['tmp_name'];
$file_size = $_FILES['file']['size'];
$file_type = $_FILES['file']['type'];
$folder="public/img/";
$new_file_name = strtolower($file);
$final_file=str_replace(' ','-',$new_file_name);
$image = $folder. $final_file . $file_type;
if(move_uploaded_file($file_loc,$folder.$final_file)){
    $req= $db->prepare("INSERT INTO animals(name, summary, image) VALUES (:name, :summary, :image,)");
    $req->execute([
    'name' => $_POST['name'],
    'summary' => $_POST['summary'],
    'image' => $_POST[$image],
    ]);
    header('Location : index.php');
    exit;
}

}

var_dump($file);
$errors = '';
    if (isset($_POST['name']) && $_POST['name'] === '') {
      $errors .= 'Veuillez rentrer un nom ';
    }

    if (isset($_POST['summary']) && $_POST['summary'] === '') {
      $errors .= 'Veuillez rentrer une description. ';
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
    <?php 
        $user = 'root';
        $pass = 'root';
    ?>
<h1>Ajouter un animal moche</h1>
<form action="" method="POST">
    Nom : <input type="text" name="name"/><br/>
    Description : <input type="text" name="summary"/><br/>
    Image : <input type="file" name="file"/><br/>
    <?php echo $errors ?>
    <input type="submit" value="Envoyer">
</form>
