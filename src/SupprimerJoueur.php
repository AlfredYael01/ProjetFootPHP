<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprimer Joueur</title>
    <link rel="stylesheet" href="projet.css">
    <link rel="stylesheet" href="menu.css">
</head>
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
<body id=affiche>

    <h1 id=TitleAfficheJ>Liste des joueurs de la FFF</h1>
</br>
</br>
</br>   

    <?php

///Connexion au serveur MySQL
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
$res = $linkpdo->query('SELECT * FROM joueur ORDER BY poste, nom');

    echo "<table id=AfficheTableSup>"; 
    echo"<td>Nom</td><td>Prénom</td><td>Photo</td><td>Numéro de licence</td><td>Taille</td><td>Poids</td><td>Poste</td><td>Supprimer</td>";
        ///Affichage des entrées du résultat une à une
while ($data = $res->fetch()) {
    echo "<tr class=\"tab\">";
    //on rajoute le numero de licence, la taille et le poids et le poste en plus des autres données et
    echo '<td>' . $data[1] . '</td><td><a href=\'ModifierJoueurs.php?id=' . $data[0] . '\'>' . $data['prenom'] . '</a></td><td><img src="' . $data['photo'] . '"></td><td>' . $data['numero_de_license'] . '</td><td>' . $data['taille'] . '</td><td>' . $data['poids'] . '</td><td>' . $data['poste'] . '</td><td><a href="SupprimerJoueurs.php?delete= '.$data['id_joueur'].' ">Supprimer</a></td>';
    echo "</td>";
    echo "<br\>";
    echo "</tr>";
}

echo "</table>";
$res->closeCursor();
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM joueur WHERE id_joueur = $id";
    $linkpdo->exec($sql);
    header("Location: SupprimerJoueurs.php");
}
    echo "</br><div id=divModifier><a id=Supprimerboutton href=AfficherJoueurs.php>Retour</a><a id=Ajouterboutton href=AfficherJoueurs.php>Valider</a></div>";
    
?>
</body>

</html>