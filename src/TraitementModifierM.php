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
if (isset($_POST['id_matchs'])) {
    $lieux = $_POST['lieux'];
    $dates = $_POST['dates'];
    $heure = $_POST['heure'];
    $nom_de_l_equipe_adverse = $_POST['nom_de_l_equipe_adverse'];
    $domicile = $_POST['domicile'];
    $resultat = $_POST['resultat'];
    $poste = $_POST['poste'];
    $id = $_POST['id'];
    $sql = "UPDATE matchs SET lieux = '$lieux', dates = '$dates', heure = '$heure', nom_de_l_equipe_adverse = '$nom_de_l_equipe_adverse', domicile = '$domicile', resultat = '$resultat', poste = '$poste' WHERE id_matchs = $id";
    $linkpdo->exec($sql);
    header("Location: AfficherMatch.php?id=$id");

}
?>
