<?php
   session_name('Entraineur');
   session_start() ;
if (isset($_POST['boutton-valider'])) { //On verifie si le boutton valider a été cliqué
    if (isset($_POST['identifiant']) && isset($_POST['mdp'])) { //On verifie si les champs identifiant et mdp ont été remplis
        $identifiant = $_POST['identifiant'];
        $mdp = $_POST['mdp'];
        $erreur = "";
        //Nous allons verifier si les informations entrée sont correctes
        if ($identifiant == "Didier" && $mdp == "Deschamps") {
            $_SESSION['identifiant'] = $identifiant;
            $_SESSION['mdp'] = $mdp;
            header('Location: menu.html');
        }
    }
}
?>
<!DOCTYPE HTML>
<html>
    <head>
    <meta charset="UTF-8">
        <link rel="stylesheet" href="projet.css"/>
        <title>Page de connexion</title>
</head>
<body id=BodyConex>
   <section id=ConnexionSection>
       <h1> Connexion</h1>
       <?php 
       if(isset($erreur)){// si la variable $erreur existe , on affiche le contenu ;
           echo "<p class= 'Erreur'>".$erreur."</p>"  ;
       }
       ?>
       <form action="" method="POST" id=ConnexionForm>  
           <label>Identifiant</label>
           <input type="text" name="identifiant">
           <label >Mots de Passe</label>
           <input type="password" name="mdp">
           <input type="submit" value="Valider" name="boutton-valider">
       </form>
   </section> 
</body>
</html>
    