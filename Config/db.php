<?php
$user = 'root';
$pass = 'root';
$dbname = 'uglyAnimals';

try {
    $db = new PDO('mysql:host=localhost;dbname='.$dbname, $user, $pass);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
}

 ?>