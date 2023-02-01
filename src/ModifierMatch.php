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
$res = $linkpdo->query('SELECT * FROM matchs WHERE id_matchs = ' . $id);
//Afficher les informations du joueur
while ($data = $res->fetch()) {
    echo "<form action=\"TraitementModifierM.php\" method=\"post\">";
    echo "<table id=AfficheTable>" ;
    echo "<tr><td>Date</td><td><input type=\"text\" name=\"dates\" value=\"" . $data['dates'] . "\"></td></tr>";
    echo "<tr><td>Heure</td><td><input type=\"text\" name=\"heure\" value=\"" . $data['heure'] . "\"></td></tr>";
    echo "<tr><td>nom de l'equipe adverse</td><td><input type=\"text\" name=\"nom_de_l_equipe_adverse\" value=\"" . $data['nom_de_l_equipe_adverse'] . "\"></td></tr>";
    echo "<tr><td>Lieu de rencontre</td><td><input type=\"text\" name=\"Domicile\" value=\"" . $data['Domicile'] . "\"></td></tr>";
    echo "<tr><td>Résultat</td><td><input type=\"text\" name=\"resultat\" value=\"" . $data['resultat'] . "\"></td></tr>";
    echo "<tr><td>Nom du stade</td><td><input type=\"text\" name=\"lieux\" value=\"" . $data['lieux'] . "\"></td></tr>";
    echo "<tr><td><input type=\"submit\" value=\"Modifier\"id=\"divModifier\"></td></tr>";
    echo "</table>";
    echo "</form>";
    echo "<h2>Les joueurs qui ont participé à ce match</h2>";
    //on recupere le nom du joueur qui ont participé au match et si y a pas de joueur on 
    $res2 = $linkpdo->query('SELECT joueur.nom,joueur.prenom,participer.note FROM joueur,participer,matchs WHERE joueur.id_joueur=participer.id_joueur AND participer.id_matchs=matchs.id_matchs AND matchs.id_matchs = ' . $id);
    //si il n'y a pas de joueur on affiche un message
    if ($res2->rowCount() == 0) {
        echo "Aucun joueur n'a participé à ce match";
    } else {
        while ($data2 = $res2->fetch()) {
            echo "<table id=AfficheTable>";
            echo "<tr><td>Nom du joueur</td><td>" . $data2['nom'] . "</td><td>Prénom du joueur</td><td>" . $data2['prenom'] . "</td><td>Note du joueur</td><td><input type=\"text\" name=\"note\" value=\"" . $data2['note'] . "\"></td></tr>";
            echo "</table>";
        }
        $res2->closeCursor();
    }
    $res->closeCursor();
}
//un bouton pour ajouter un joueur 
echo "<form action=\"\" method=\"post\"id = \"divAjouterJPasIn\">";
//selelcteur de joueur 
echo "<select name=\"joueur\">";
//affiche la liste des joeurs qui n'ont pas encore participé au match et on l'ajoute au match quand on clique sur le bouton ajouter un joueur

$res3 = $linkpdo->query('SELECT joueur.nom,joueur.prenom,joueur.id_joueur FROM joueur WHERE joueur.id_joueur NOT IN (SELECT joueur.id_joueur FROM joueur,participer,matchs WHERE joueur.id_joueur=participer.id_joueur AND participer.id_matchs=matchs.id_matchs AND matchs.id_matchs = ' . $id . ')');
while ($data3 = $res3->fetch()) {
    echo "<option value=\"" . $data3['id_joueur'] . "\">" . $data3['nom'] . " " . $data3['prenom'] . "</option>";
}
echo "</select>";
echo "<input type=\"submit\" value=\"Ajouter un joueur\">";
echo "</form>";
//recuper le joueur qui a été selectionné et on l'ajoute au match
if (isset($_POST['joueur'])) {
    $id_joueur = $_POST['joueur'];
    $res4 = $linkpdo->query('INSERT INTO participer (id_joueur,id_matchs) VALUES (' . $id_joueur . ',' . $id . ')');
}


?>