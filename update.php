<?php

    include('Config/db.php');
    include('template/nav.php');
        if (
            $_POST &&
            isset($_POST['name']) && $_POST['name'] !== '' &&
            isset($_POST['summary']) && $_POST['summary'] !== '' &&
            isset($_POST['Type']) && $_POST['Type'] !== '' &&
            isset($_POST['hp']) && $_POST['hp'] !== '' &&
            isset($_POST['pc']) && $_POST['pc'] !== '' 
            
          ) {
        
        $req = $db->prepare('UPDATE animals SET name=:name, summary=:summary, Type=:Type, hp=:hp, pc=:pc, WHERE id=:id');
        
        $req->execute([
            'id' => '',
            'name' => $_POST['name'],
            'summary' => $_POST['summary'],
            'Type' => $_POST['Type'],
            'pc' => $_POST['pc'],
            'hp' => $_POST['hp'],
            'image' => "public/img/pokeballmoche.jpg",
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
      $errors .= 'Nom invalide. ';
    }

    if (isset($_POST['summary']) && $_POST['summary'] === '') {
      $errors .= 'Veuillez rentrer une description ';
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="./public/css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Exo:wght@500&family=Roboto+Flex:opsz@8..144&display=swap" rel="stylesheet"> 
    <title>Modifier un animal moche</title>
</head>
<body>

    <div class="container">
        <h1 class="teal-text">Modifier un animal moche</h1>

        <form action="" method="POST">
            Nom : <input type="text" name="name" value="<?php echo $data['name']; ?>"> <br>
            Description : <input type="text" name="category" value="<?php echo $data['summary']; ?>"> <br>
            Type : <select name="Type"><option value="<?php echo $data['Type']; ?>"> <br>
            HP : <input type="number" name="hp" value="<?php echo $data['hp']; ?>"> <br>
            PC : <input type="number" name="pc" value="<?php echo $data['pc']; ?>"> 

            <span><?php echo $errors; ?></span> <br>

            <input type="submit" value="Modifier" class="btn btnprimary">
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html