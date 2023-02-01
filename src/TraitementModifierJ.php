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
if (isset($_POST['nom'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $photo = $_POST['photo'];
    $numero_de_license = $_POST['numero_de_license'];
    $taille = $_POST['taille'];
    $poids = $_POST['poids'];
    $poste = $_POST['poste'];
    $id = $_POST['id'];
    $sql = "UPDATE joueur SET nom = '$nom', prenom = '$prenom', photo = '$photo', numero_de_license = '$numero_de_license', taille = '$taille', poids = '$poids', poste = '$poste' WHERE id_joueur = $id";
    $linkpdo->exec($sql);
    header("Location: AfficherJoueurs.php?id=$id");

}
?>
