<<<<<<< Updated upstream
<?php
 include('Config/db.php');
 include('token.php');
 $resp = $db->query('SELECT * FROM Animals');
 $token = generer_token('ajout');
 $errors= '';
if (
    verifier_token(600, 'post.php', 'ajout');
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
    'name' => strip_tags($_POST['name']),
    'summary' => strip_tags($_POST['summary']),
    'image' => ($_POST[$image]),
    ]);
    header('Location : index.php');
    exit;
}

}


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
<form action="" method="POST">
    Nom : <input type="text" name="name"/><br/>
    Description : <input type="text" name="summary"/><br/>
    Image : <input type="file" name="file"/><br/>
    <?php echo $errors ?>
    <input type="submit" value="Envoyer">
</form>
=======
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
    'image' => "public/img/pokeballmoche.jpg"
    ]);
    header('Location : index.php');
    exit;
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
<div style="width:80vw;margin-left:10vw;align-items:center;justify-content:center;margin-top:5vh;" class="d-flex flex-column">
  <h1>Ajouter un animal moche</h1>
  <form action="" method="POST" style="width:50vw;margin-left:25vw;">
      Nom : <input type="text" name="name"/>
      Description : <input type="text" name="summary"/><br/>
      Type : <input type="text" name="Type"/><br/>
      Point de combat : <input type="text" name="pc"/>
      Point de vie : <input type="text" name="hp"/>
      <?php echo $errors ?>
      <input type="submit" class="btn btn-primary" value="Envoyer">
  </form>
</div>

  </body>
</html>
>>>>>>> Stashed changes
