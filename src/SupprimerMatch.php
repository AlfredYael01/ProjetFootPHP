<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afficher Match</title>
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

    <h1 id=TitleAfficheJ>Liste des matchs de la FFF</h1>
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
$res = $linkpdo->query('SELECT * FROM matchs ORDER BY dates,heure');

    echo "<table id=AfficheTable>"; 
    echo"<td>Date</td><td>Heure</td><td>Nom de l'equipe adverse</td><td>Lieu de rencontre</td><td>Nom du stade</td><td>Resultat</td><td>Supprimer le match</td>";
///Affichage des entrées du résultat une à une
while ($data = $res->fetch()) {
    echo "<tr class=\"tab\">";
    //affiche la date,l'heure,le nom de l'équipe adverse, le lieu de rencontre et le resultat
    echo '<td><a href=\'ModifierMatch.php?id=' . $data[0] .'\'>' .$data['dates'].'</a></td>';
    echo "<td>" . $data['heure'] . "</td>";
    echo "<td>" . $data['nom_de_l_equipe_adverse'] . "</td>";
     
    //affiche domicile si la valeur est egale a 1 et exterieur si le match est egale a 0
    if ($data['domicile'] == 1) {
        echo "<td>" . "Domicile" . "</td>";
    } else {
        echo "<td>" . "Exterieur" . "</td>";
    }

    echo "<td>" . $data['lieux'] . "</td>";
    echo "<td>" . $data['resultat'] . "</td>";
    echo '<td><a href=\'SupprimerMatch.php?delete=' . $data[0] . '\'>Supprimer</a></td>';

    
    echo "</td>";
    echo "<br\>";
    echo "</tr>";
}

echo "</table>";
$res->closeCursor();
echo "</br><div id=divModifier><a id = AnnulerBoutton href=AfficherMatch.php>Annuler</a><a id=Ajouterboutton href=FormulaireAjouterUnMatch.php>Ajouter un match</a></div>";
     
?>
</body>

</html>