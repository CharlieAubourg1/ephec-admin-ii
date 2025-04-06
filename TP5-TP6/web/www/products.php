<html>
<style>
   table,
   th,
   td {
      padding: 10px;
      border: 1px solid black;
      border-collapse: collapse;
   }
</style>

<head>
<title>Catalogue WoodyToys</title>
</head>

<body>
<h1>Catalogue WoodyToys</h1>

<?php
// Récupérer les paramètres de connexion à partir des variables d'environnement définies dans docker-compose.yml
$dbname = 'woodytoys';      // Nom de la base de données
$dbuser = getenv('MARIADB_USER');   // Utilisateur (référez-vous à MARIADB_USER dans docker-compose.yml)
$dbpass = getenv('MARIADB_PASSWORD');  // Mot de passe (référez-vous à MARIADB_PASSWORD dans docker-compose.yml)
$dbhost = getenv('MARIADB_HOST');    // Nom du service MariaDB (mariadb ici, défini dans docker-compose.yml)

// Connexion à la base de données
$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die("Impossible de se connecter à '$dbhost'");

// Requête SQL pour récupérer les produits
$result = mysqli_query($connect, "SELECT id, product_name, product_price FROM products");

if (!$result) {
    die("La requête a échoué : " . mysqli_error($connect));
}
?>

<table>
<tr>
 <th>Numéro de produit</th>
 <th>Descriptif</th>
 <th>Prix</th>
</tr>

<?php
// Affichage des résultats dans un tableau HTML
while ($row = mysqli_fetch_array($result)) {
    printf("<tr><td>%s</td><td>%s</td><td>%s</td></tr>", $row[0], $row[1], $row[2]);
}
?>

</table>

<?php
// Fermeture de la connexion à la base de données
mysqli_close($connect);
?>

</body>
</html>
