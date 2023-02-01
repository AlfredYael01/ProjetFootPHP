
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="menu.css">
    <link rel="stylesheet" href="projet.css">
    <meta charset="utf-8">
    <title>Menu de l'équipe de football</title>
  </head>
  <body>
  <header>
      <nav id="wrapper">
        <div class="logo">
          <img src="image/logofrance.png" alt="Logo de l'équipe de football">
        </div>
        
        
      <ul class="menu">
        <li class="menu__item">
          <a href="menu.html" class="menu__link">Accueil</a>
        </li>
        <li class="menu__item">
          <a href="AfficherJoueurs.php" class="menu__link">Joueurs</a>
            
        </li>
        <li class="menu__item">
          <a href="AfficherMatch.php" class="menu__link"> Matchs</a>
            
        </li>
        <li>
            <a href="authentification.php" class="logout">Se déconnecter</a>
        </li>
        
      </ul>
    </nav>
  </header>
  <?php
$id = $_GET['id'];
//Connexion au serveur MySQL
$server = "localhost";
$db = "id19948746_projet";
$login = "id19948746_root";
$mdp = "jxODT\q1t6c2#lO6";
try {
    $linkpdo = new PDO("mysql:host=$server;dbname=$db", $login, $mdp);
} catch (Exception $e) {

    die('Erreur : ' . $e->getMessage());
}
///Exécution d’une requête SELECT sur le serveur MySQL
$res = $linkpdo->query('SELECT * FROM joueur WHERE id_joueur = ' . $id);
//Afficher les informations du joueur
while ($data = $res->fetch()) {
    //afficher la photo du joueur
    
    echo "<img src=\"" . $data['photo'] . "\">";
    echo "<form action=\"TraitementModifierJ.php\" method=\"post\">";
    //modifier la photo du joueur
    echo "<input type=\"file\" name=\"photo\" accept=\"image/png, image/jpeg, image/jpg\" value=\"" . $data['photo'] . "\"required>";
    echo "<table id=Tablemodifier> ";
    echo "<tr><td>Nom</td><td><input type=\"text\" name=\"nom\" value=\"" . $data['nom'] . "\"></td></tr>";
    echo "<tr><td>Prénom</td><td><input type=\"text\" name=\"prenom\" value=\"" . $data['prenom'] . "\"></td></tr>";
    echo "<tr><td>Numéro de licence</td><td><input type=\"text\" name=\"numero_de_license\" value=\"" . $data['numero_de_license'] . "\"></td></tr>";
    echo "<tr><td>Taille</td><td><input type=\"text\" name=\"taille\" value=\"" . $data['taille'] . "\"></td></tr>";
    echo "<tr><td>Poids</td><td><input type=\"text\" name=\"poids\" value=\"" . $data['poids'] . "\"></td></tr>";
    echo "<tr><td>Poste</td><td><input type=\"text\" name=\"poste\" value=\"" . $data['poste'] . "\"></td></tr>";
    echo "<tr><td>Statut</td><td><input type=\"text\" name=\Statut_J\" value=\"".$data['Statut_J']."\"></td></tr>";
    echo "<tr><td><input type=\"hidden\" name=\"id\" value=\"" . $data['id_joueur'] . "\"></td></tr>";
    echo "<tr><td><input id =\"divModifier\" type=\"submit\" value=\"Modifier\"></td></tr>";
    echo "</table>";
    echo "</form>";
}
$res->closeCursor();

?>
</body>
</html> 

