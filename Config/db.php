<?php
$user = 'root';
$pass = 'root';
<<<<<<< HEAD
$dbname = 'uglyanimals';
=======
$dbname = 'uglyAnimals';
>>>>>>> 7529d9f124785aaff1ced37f56bfe63e616ae35e

try {
    $db = new PDO('mysql:host=localhost;dbname='.$dbname, $user, $pass);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
}

 ?>