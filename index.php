<?php
    //Nous allons demarrer la session
session_start();
    
    if(isset($_POST['boutton-valider'])){ // si on clique sur le boutton alors:
        //Nous allons verifier les informations du formulaire
    if(isset($_POST['email']) && isset($_POST['mdp'])) {//on verifie ici si l4utilisqteur a rentr2 des informations 
        //Nous allons mettres l'email et le mot de passe dans des variables
        $email=$_POST['email'];
        $mdp=$_POST['mdp'];
        $erreur="";
       //Connexion à la base de Donnée
       $nom_serveur ="localhost";
       $utilisateur ="root";
       $mot_de_passe ="";
       $nom_base_donnees="form";
       $con=mysqli_connect($nom_serveur,$utilisateur,$mot_de_passe,$nom_base_donnees);
       //Requete pour sélectionner l'utilisateur qui a pour email et mot de passe les identifiants qui ont été entrées
       $req=mysqli_query($con,"SELECT *FROM utilisateurs WHERE email='$email' AND mdp='$mdp'  ");
       $num_ligne = mysqli_num_rows($req); //Compter le nombre de ligne ayant rapport à la requete SQL
        if($num_ligne>0){
            header("Location:bienvenu.php"); //Si le nombre de ligne est > 0 on sera redirigé vers la page de bienvenue 
            //Nous allons créer une variable de type session qui va contenir l'email de l'utilisateur
            $_SESSION['email'] = $email;
        } else //sinon
            $erreur = "Adresse Mail ou Mots de Passe Incorrects!";
               
       
        }

    }
?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <!-- Font awesome cdn CSS-->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

		<!-- Bootstrap core CSS -->
		<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="style.css" />

        <title>Formulaire de Connexion</title>
    </head>
        <body>
            <section>
                <h1>Connexion</h1>
                <?php
                if (isset($erreur)) //si la variable $erreur existe, on affiche le contenu;
                    echo "<p class='erreur'>$erreur</p>" ;
                ?>
            <form action="" method="POST"> <!--On ne mets plus rien au niveau de l'action, pour pouvoir envoyé les données-->
                <label>Adresse Mail</label>
            <input type="text" name="email">
            <label>Mot de Passe</label>
            <input type="password" name="mdp">
            <input type="submit" value="Valider" name="boutton-valider">
            </form>
            
            </section>
        </body>
</html>