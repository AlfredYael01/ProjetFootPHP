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
    
    <h1 id=TitleAfficheJ>Formulaire d'ajout d'un match</h1>
</br>
</br>
</br>
    <?php



echo"<div id=divFormulaire>";

///Creation du formulaire d'ajout d'un joueur
echo "<form id=FormAjout method='post' action=\"TraitementFormMatch.php\"enctype=\"multipart/form-data\">";
echo"</br>";

//titre du formulaire
echo"<div id=divTitreFormulaire>";
echo "<h2 id=TitreFormulaire>Nouveau Match</h2>";
echo"</div>";
echo"</br>";

///date du match
echo"<div id=divDateHeureM>";
echo "<label for=\"date\">Date du match &emsp;</label>";
echo "<input type=\"date\" id=\"date\" name=\"date\"required>&emsp;&emsp;&emsp;&ensp;";

///Heure du match 
echo "<label for=\"heure\">Heure du match &emsp;</label>";
echo "<input type=\"time\" id=\"heure\" name=\"heure\"required>&emsp;&emsp;&emsp;</br>";
echo"</br>";
echo"</br>";
echo"</div>";

///nom de l'equipe adverse
echo"<div id=divEquipeAdvDomExt>";
echo "<label for=\"equipe_adverse\">Equipe adverse &emsp;</label>";
echo "<input type=\"text\" id=\"equipe_adverse\" name=\"equipe_adverse\"required>&emsp;&emsp;&emsp;&ensp;";

///selecteur domicile ou exterieur
echo "<label for=\"domicile_exterieur\">Domicile ou exterieur &emsp;</label>";
echo "<select id=\"domicile_exterieur\" name=\"domicile_exterieur\"required>";
echo "<option value=\"domicile\">Domicile</option>";
echo "<option value=\"exterieur\">Exterieur</option>";
echo "</select>&emsp;&emsp;&emsp;</br>";
echo"</br>";
echo"</br>";
echo"</br>";
echo"</div>";

///Resultat du match
echo"<div id=divResultLieux>";
echo "<label for=\"resultat\">Resultat &emsp;</label>";
echo "<input type=\"text\" id=\"resultat\" name=\"resultat\"required>&emsp;&emsp;&emsp;&ensp;";

///Lieux du match
echo "<label for=\"lieux\">Lieux du match &emsp;</label>";
echo "<input type=\"text\" id=\"lieux\" name=\"lieux\"required>&emsp;&emsp;&emsp;</br>";
echo"</br>";
echo"</div>";


///bouton d'annulation
echo "<input id = BtnAnnulerMatch type=\"button\" value=\"Annuler\" onclick=\"window.location.href='AfficherMatch.php'\">&emsp;&emsp;&emsp;";

///bouton  qui ajoute les informations du joueur dans la base de donnee et redirige vers la page AfficherMatch.php

echo "<input id = BtnAjouterMatch type=\"submit\" value=\"Ajouter\">&emsp;&emsp;&emsp;";


echo "</form>";
echo"</div>";
echo"</div>";


?>
</body>
</html>

