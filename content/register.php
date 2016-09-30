<?php

    
    try
    {
        $bdd = new PDO("mysql:host=localhost;dbname=parking","root","");
    }
    catch(Exception $e)
    {
        die("erreur de connection");
    }
 
    if(isset($_POST['submit']))
    {
        $login = $_POST['login'];
        $mdp = sha1($_POST['mdp']);
        $prenom = $_POST['prenom'];
        $nom = $_POST['nom'];
        $email = $_POST['email'];
        $i = 0;
        
        
        if($i == 0)
        {
            //traitement
            
            $requete = $bdd->prepare("INSERT INTO users(login,mdp,prenom,email,nom,status) 
                                    VALUES(:login,:mdp,:prenom,:email,:nom,0)");
           $requete->bindValue(":login",$login,PDO::PARAM_STR);
           $requete->bindValue(":mdp",$mdp,PDO::PARAM_STR);
           $requete->bindValue(":prenom",$prenom,PDO::PARAM_STR);
           $requete->bindValue(":email",$email,PDO::PARAM_STR);
           $requete->bindValue(":nom",$nom,PDO::PARAM_STR);
           $requete->execute();
           
           echo "<h2>Votre demande d'inscription a bien été prise en compte, il faudra attendre la validation de l'administrateur pour pouvoir effectuer une reservation.</h2>";
            if (!$requete) 
            {
                echo "<div class='cant'>Nom d'utilisateur ou E-Mail déjà inscrit.</div>";}
            }
      
         
    }
?>             
                
               

<div class="container">
<form action="#" method="post" enctype="multipart/form-data" class="inscrip">
<div class="row">
<div class="col-md-offset-2 col-md-8">
<h1> Inscription <br/> <small> Merci de renseigner vos informations </small></h1>
</div>
</div>

<div class="row">
<div class="col-md-offset-2 col-md-3">
<div class="form-group">
<label for="Nom">Nom</label>
<input type="text" class="form-control" name="nom" id="nom" placeholder="Nom" required/>
</div>
</div>
<div class="col-md-offset-1 col-md-3">
<div class="form-group">
<label for="Prenom">Prénom</label>
<input type="text" class="form-control" id="prenom" placeholder="Prénom" name="prenom" required/>
</div>
</div>
</div>

<div class="row">
<div class="col-md-offset-2 col-md-7">
<div class="form-group">
<label for="Email">Adresse mail</label>
<input type="email" class="form-control" id="email" placeholder="email" name="email" required/>
</div>
</div>
</div>

<div class="row">
<div class="col-md-offset-2 col-md-3">
<div class="form-group">
<label for="login">Login</label>
<input type="text" class="form-control" id="login" placeholder="login" name="login" required/>
</div>
</div>



<div class="col-md-offset-1 col-md-3">
<div class="form-group">
<label for="Password">Mot de passe</label>
<input type="password" class="form-control" id="password" placeholder="Mot de passe" name="mdp" required/>
</div>
</div>
    </div>


<br/>
<div class="row">
<div class="col-md-offset-5 col-md-1">
<input type="submit" name="submit" id="submit" class="btn btn-primary" />
</div>
</div>

</div>
</form>
