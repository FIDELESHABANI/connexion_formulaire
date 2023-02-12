<?php
    //Nous allons verifier les informations du formulaire
    if(isset($_POST['email']) && isset($_POST['mdp'])) {//on verifie ici si l4utilisqteur a rentr2 des informations 
    //Nous allons mettres l'email et le mot de passe dans des variables
    $email=$_POST['email'];
    $mdp=$_POST['mdp'];
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
    } else //sinon
        echo "Adresse Mail ou Mots de Passe Incorrects!";    
   
    }
?>