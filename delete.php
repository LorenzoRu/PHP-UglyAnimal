<?php 

include('./Config/db.php');

$req = $db->prepare('DELETE FROM animals WHERE id=:id');
$req->execute([
   'id' => $_GET['id']
]);

header('Location: index.php');
exit;
?>
