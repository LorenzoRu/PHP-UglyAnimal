<?php
 include('Config/db.php');
 include('template/nav.php');
 $resp = $db->query('SELECT * FROM Animals');
 
$errors= '';
if (
    $_POST &&
    isset($_POST['name']) && $_POST['name'] !== '' &&
    isset($_POST['summary']) && $_POST['summary'] !== '' &&
    isset($_POST['Type']) && $_POST['Type'] !== '' &&
    isset($_POST['hp']) && $_POST['hp'] !== '' &&
    isset($_POST['pc']) && $_POST['pc'] !== '' 
    
  ) {
    $req= $db->prepare("INSERT INTO animals(name, summary, Type, pc, hp, image) VALUES (:name, :summary, :Type, :pc, :hp, :image)");
    $req->execute([
    'name' => $_POST['name'],
    'summary' => $_POST['summary'],
    'Type' => $_POST['Type'],
    'pc' => $_POST['pc'],
    'hp' => $_POST['hp'],
    'image' => "/public/img/pangolin.jpg",
    'id' => $_GET['id']
    ]);
    header('Location: show.php?id=' . $_GET['id']);
    exit;
} else {
  $response = $db->query('SELECT * FROM animals WHERE id=' . $_GET['id']);
  $data = $response->fetch();
}

$errors = '';
    if (isset($_POST['name']) && $_POST['name'] === '') {
      $errors .= 'Veuillez rentrer un nom ';
    }

    if (isset($_POST['summary']) && $_POST['summary'] === '') {
      $errors .= 'Veuillez rentrer une description. ';
    }
    
    if(isset($_POST['Type']) && $_POST['Type'] === ''){
      $errors .= 'Veuillez rentrer un type. ';
    }

    if(isset($_POST['hp']) && $_POST['hp'] === ''){
      $errors .= 'Veuillez rentrer un hp. ';
    }

    if(isset($_POST['pc']) && $_POST['pc'] === ''){
      $errors .= 'Veuillez rentrer un pc. ';
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
<h1>Ajouter un animal moche</h1>
<form action="" method="POST">
    Nom : <input type="text" name="name" value="<?php echo $data['name']; ?>"/><br/>
    Description : <input type="text" name="summary" value="<?php echo $data['summary']; ?>"/><br/>
    Type : <input type="text" name="Type" value="<?php echo $data['Type']; ?>"/><br/>
    Point de combat : <input type="text" name="pc" value="<?php echo $data['pc']; ?>"/><br/>
    Point de vie : <input type="text" name="hp" value="<?php echo $data['hp']; ?>"/><br/>
    <?php echo $errors ?>
    <input type="submit" value="Envoyer">
</form>
