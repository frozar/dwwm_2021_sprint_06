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
// dev configuration
    if (strcmp($_SERVER['ENVIRONMENT_TYPE'], "development") == 0) {
        $mysqlClient = new PDO(
            'mysql:host=localhost;dbname=sprint_06;charset=utf8',
            'sprint_06',
            'sprint_06'
        );
    }

    // prod configuration
    if (strcmp($_SERVER['ENVIRONMENT_TYPE'], "production") == 0) {
        $mysqlClient = new PDO(
            'mysql:host=109.234.164.161;dbname=sc1lgvu9627_rozar-fabien.sprint-06;charset=utf8',
            $_SERVER['DB_USER'],
            $_SERVER['DB_PASSWORD']
        );
    }
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$articleStatement = $mysqlClient->prepare('SELECT * FROM article');
$articleStatement->execute();
$articles = $articleStatement->fetchAll();

// On affiche chaque recette une à une
foreach ($articles as $article) {
    ?>
     <p><?php echo $article['reference']; ?></p>
     <?php
}
?>

  </body>
</html>
