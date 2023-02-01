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
    $date = $_POST['date'];
    $heure = $_POST['heure'];
    $equipe_adverse = $_POST['equipe_adverse'];
    $domicile_exterieur = $_POST['domicile_exterieur'];
    $resultat = $_POST['resultat'];
    $lieux = $_POST['lieux'];
    $sql = "INSERT INTO matchs (dates, heure, nom_de_l_equipe_adverse, domicile, resultat, lieux) VALUES ('$date', '$heure', '$equipe_adverse', '$domicile_exterieur', '$resultat', '$lieux')";
    if (!$sql){
        die('Erreur : ' . $e->getMessage());
    }
    $result = $linkpdo->query($sql);
    //afficher le resultat dans un tableau
    header('Location: AfficherMatch.php');

?>