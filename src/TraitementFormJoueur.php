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
function uploadImage($photo)
{

    if (isset($photo)) {
        $tmpName = $photo['tmp_name'];
        $name = $photo['name'];
        $size = $photo['size'];
        $error = $photo['error'];

        $tabExtension = explode('.', $name);
        $extension = strtolower(end($tabExtension));

        $extensions = ['jpg', 'png', 'jpeg', 'gif', 'svg', 'webp', 'bmp'];
        $maxSize = 400000000000;

        if (in_array($extension, $extensions) && $size <= $maxSize && $error == 0) {

            $uniqueName = uniqid('', true);
            //uniqid génère quelque chose comme ca : 5f586bf96dcd38.73540086
            $file = $uniqueName . "." . $extension;
            $chemin = "image/";
            //$file = 5f586bf96dcd38.73540086.jpg
            move_uploaded_file($tmpName, 'image/' . $file);
            $result = $chemin . $file;
        }
    } else {
        echo '<h1>erreur</h1>';
    }
    return $result;
}
///Exécution d’une requête SELECT sur le serveur MySQL
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $nationalite = $_POST['nationalite'];
    $photo = uploadImage($_FILES['photo']);
    $numero_de_license = $_POST['numero_de_license'];
    $date_de_naissance = $_POST['date_de_naissance'];
    $taille = $_POST['taille'];
    $poids = $_POST['poids'];
    $ville = $_POST['ville'];
    $code_postal = $_POST['code_postal'];
    $poste = $_POST['poste'];
    $statut = $_POST['statut'];
    $commentaire = $_POST['commentaire'];
    $sql = "INSERT INTO joueur (nom, prenom, nationalite, photo, numero_de_license, date_de_naissance, taille, poids, ville, code_postal, poste, statut_j, commentaire) VALUES ('$nom', '$prenom', '$nationalite', '$photo', '$numero_de_license', '$date_de_naissance', '$taille', '$poids', '$ville', '$code_postal', '$poste', '$statut', '$commentaire')";
    if (!$sql){
        die('Erreur : ' . $e->getMessage());
    }
    $result = $linkpdo->query($sql);
    header('Location: AfficherJoueurs.php');
    
?>