<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afficher Joueurs</title>
    <link rel="stylesheet" href="projet.css">
</head>
<body id=BodyFormulaire>

    <h1 id=TitleAfficheJ>Formulaire d'ajout d'un joueur</h1>
</br>
</br>
</br>
    <?php

echo"<div id=divFormulaire>";

///Creation du formulaire d'ajout d'un joueur
echo "<form id=FormAjout method='post' action=\"TraitementFormJoueur.php\"enctype=\"multipart/form-data\">";
echo"</br>";

//titre du formulaire
echo"<div id=divTitreFormulaire>";
echo "<h2 id=TitreFormulaire>Nouveau Joueur</h2>";
echo"</div>";
echo"</br>";

///nom du joueur
echo"<div id=divNomPrenom>";
echo "<label  for=\"nom\">Nom &emsp;&emsp;</label>";
echo "<input type=\"text\" id=\"nom\" name=\"nom\"required>&emsp;&emsp;&emsp;&emsp;&emsp;";

///prenom du joueur
echo "<label for=\"prenom\">Prénom &emsp;</label>";
echo "<input type=\"text\" id=\"prenom\" name=\"prenom\"required>&emsp;&emsp;&emsp;</br>";
echo"</br>";
echo"</br>";
echo"</div>";
///nationalite du joueur
echo"<div id=divNationalitePhoto>";
echo "<label for=\"nationalite\">Nationalité &emsp;</label>";
echo "<input type=\"text\" id=\"nationalite\" name=\"nationalite\" value=\"Francais\" readonly>&emsp;&emsp;&emsp;&ensp;";

///photo du joueur et les formats de la photo est seulement .jpg .jpeg .png et la photo est deposer dans le fichier image
echo "<label for=\"photo\">Photo &emsp;</label>";
echo "<input type=\"file\" id=\"photo\" name=\"photo\"required accept=\"image/png, image/jpeg, image/jpg\">&emsp;&emsp;&emsp;</br>";
echo"</br>";
echo"</br>";
echo"</br>";
echo"</div>";

///numero de license du joueur
echo"<div id=divNumeroLicenseDateNaissance>";
echo "<label for=\"numero_de_license\">Numéro de license &emsp;</label>";
echo "<input type=\"text\" id=\"numero_de_license\" name=\"numero_de_license\"required>&emsp;&emsp;&emsp;";

///date de naissance du joueur
echo "<label for=\"date_de_naissance\">Date de naissance &emsp;</label>";
echo "<input type=\"date\" id=\"date_de_naissance\" name=\"date_de_naissance\"required>&emsp;&emsp;&emsp;</br>";
echo"</br>";
echo"</br>";
echo"</div>";

///un selecteur de taille avec des valeurs de 0cm a 250cm
echo"<div id=divTaillePoids>";
echo "<label for=\"taille\">Taille en cm &emsp;</label>";
echo "<select id=\"taille\" name=\"taille\"required>";
for ($i = 0; $i <= 250; $i++) {
    echo "<option value=\"$i\">$i</option>";
}
echo "</select>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;";

///un selecteur de poids avec des valeurs de 0kg a 120kg
echo "<label for=\"poids\">Poids en kg &emsp;</label>";
echo "<select id=\"poids\" name=\"poids\"required>&emsp;&emsp;&emsp;";
for ($i = 0; $i <= 120; $i++) {
    echo "<option value=\"$i\">$i</option>";
}
echo "</select></br>";
echo"</br>";
echo"</br>";
echo"</div>";

///ville du joueur
echo"<div id=divVilleCodePostal>";
echo "<label for=\"ville\">Ville &emsp;</label>";
echo "<input type=\"text\" id=\"ville\" name=\"ville\"required>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;";

///code postal du joueur
echo "<label for=\"code_postal\">Code postal &emsp;</label>";
echo "<input type=\"text\" id=\"code_postal\" name=\"code_postal\"required>&emsp;&emsp;&emsp;</br>";
echo"</br>";
echo"</br>";
echo"</div>";

///poste du joueur qui est un selecteur ou on choisis soit gardien, defenseur, milieu, attaquant
echo"<div id=divPoste>";
echo "<label for=\"poste\">Poste &emsp;</label>";
echo "<select id=\"poste\" name=\"poste\"required>&emsp;&emsp;&emsp;";
echo "<option value=\"attaquant\">Attaquant</option>";
echo "<option value=\"milieu\">Milieu</option>";
echo "<option value=\"defenseur\">Defenseur</option>";
echo "<option value=\"gardien\">Gardien</option>";
echo "</select>";
///le statut du joueur si il est actif,blessé,suspendu ou absent
echo "<label for=\"statut\">&emsp;&emsp;&emsp; &emsp;&emsp;&emsp; Statut &emsp;</label>";
echo "<select id=\"statut\" name=\"statut\"required>&emsp;&emsp;&emsp;";
echo "<option value=\"actif\">Actif</option>";
echo "<option value=\"blessé\">Blessé</option>";
echo "<option value=\"suspendu\">Suspendu</option>";
echo "<option value=\"absent\">Absent</option>";
echo "</select></br>";
echo"</br>";
echo"</br>";
echo"</br>";
echo"</div>";

//on peut ecrire un commentaire sur le joueur et peut pas l'agrandir
echo"<div id=divCommentaire>";
echo "<label for=\"commentaire\">Commentaire &emsp;</label>";
echo "<textarea id=\"commentaire\" name=\"commentaire\"required rows=\"4\" cols=\"50\"></textarea></br>";
echo"</br>";

///bouton d'annulation
echo "<input id = BtnAnnulerJoueur type=\"button\" value=\"Annuler\" onclick=\"window.location.href='AfficherJoueurs.php'\">&emsp;&emsp;&emsp;";

///bouton  qui ajoute les informations du joueur dans la base de donnee et redirige vers la page AfficherJoueurs.php

echo "<input id = BtnAjouterJoueur type=\"submit\" value=\"Ajouter\" >&emsp;&emsp;&emsp;";


echo "</form>";
echo"</div>";
echo"</div>";



?>
</body>
</html>

