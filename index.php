<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
  </head>
  <body>
    <h1>Hello sprint_06</h1>
    <?php echo "<h2>Hello php</h2>"; ?>

<?php
try {
// Souvent on identifie cet objet par la variable $conn ou $db
    $mysqlClient = new PDO(
        'mysql:host=localhost;dbname=sprint_06;charset=utf8',
        'sprint_06',
        'sprint_06'
    );
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
// die('hello die' . $mysqlClient);

$articleStatement = $mysqlClient->prepare('SELECT * FROM article');
$articleStatement->execute();
$articles = $articleStatement->fetchAll();

$toto;

// On affiche chaque recette une à une
foreach ($articles as $article) {
    ?>
    <p><?php echo $article['reference']; ?></p>
    <?php
}
?>

  </body>
</html>
