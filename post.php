<?php
include('./Config/db.php');
$resp = $db->query('SELECT * FROM Animals');

$errors= '';
if ($_POST &&
isset($_POST['name']) && $_POST['name'] !== '' &&
isset($_POST['summary']) && $_POST['summary'] !== '' &&
isset($_POST['image']) && $_POST['image'] !== ''  &&{
    $user = 'root';
    $pass = 'root';
    try {
        $db, $user, $pass);
    } catch (PDOException $e) {
        print "Erreur!:" . $e->getMessage() . "<br/>";
        die();
    }
    $req= $db->prepare("INSERT INTO animals(name, summary, image) VALUES (:name, :summary, :price, :weight)");
    $req->execute([
        'name' => $_POST['name'],
        'summary' => $_POST['summary'],
        'price' => $_POST['price'],
        'weight' => $_POST['weight']
    ]);
    header('Location : index.php');
    exit;
}

?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  
</head>

<body>
<nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Akueil</a>
    <a class="navbar-brand" href="tablesmultiplications.php">Révise tes multiplications </a>
    <a class="navbar-brand" href="calculatrice.php">Calculatrice</a>
    <a class="navbar-brand" href="tableau.php">Tableau dynamique</a>
    <a class="navbar-brand" href="nombres.php">Apprends à compter jusqu'à 100</a>
    <a class="navbar-brand" href="nombresimpairs.php">Les nombres impairs jusqu'à 100</a>
    <a class="navbar-brand" href="db.php">Database céréales</a>
    <a class="navbar-brand" href="postcereale.php">Ajouter</a>
  </div>
</nav>
    <?php 
        $user = 'root';
        $pass = 'root';
    ?>
    <h1>Ajouter un céréale</h1>
<form action ="" method="POST">
    Nom : <input type="text" name="name"/><br/>
    Catégorie : <input type="text" name="category"/><br/>
    Prix : <input type="text" name="price"/><br/>
    Poids en kg : <input type="number" name="weight"/><br/>
    <?php echo $errors ?>
    <input type="submit" value="Envoyer">
</form>