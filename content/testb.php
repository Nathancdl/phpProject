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
        $email = $_POST['email'];
        $i = 0;
         $a = rand(0,10);
        $b = rand(0,10);
        $c = rand(0,10);
        $dv = $a."".$b;
        $dr = $c."".$b;
        $mdpf = $dv."mode".$dr;
        $mdp = sha1($mdpf);
        
        if($i == 0)
        {
            //traitement
            
            $requete = $bdd->prepare("select * from users WHERE login = :login and email = :email");
           $requete->bindValue(":login",$login,PDO::PARAM_STR);
           $requete->bindValue(":email",$email,PDO::PARAM_STR);
           $requete->execute();
           
           
                if (!$requete->fetch()) 
                {
                    echo "<h1>Aucune correspondance entre le login et l'email.</h1>";
                }
                else
                {
                 $requete = $bdd->prepare("UPDATE users set mdp = :mdp WHERE login = :login and email = :email");
               $requete->bindValue(":login",$login,PDO::PARAM_STR);
               $requete->bindValue(":mdp",$mdp,PDO::PARAM_STR);
               $requete->bindValue(":email",$email,PDO::PARAM_STR);
               $requete->execute();

                echo "<h1>Votre mot de passe a été modifié : ".$mdpf." <br> Veuillez vous connecter et changer votre mot de passe pour plus de sécurité</h1>";
                }
         }
    }
?>             
                
                <div class='inscri'>
                  <a href="#" style="text-decoration:none">Connexion</a>
                   <a class="titre">Mot de passe oublié</a>
                   
                    <form action="#" method="post" enctype="multipart/form-data" class="inscrip">
                        <a>Nom d'utilisateur : </a><input type="text" name="login" required /><br/>
                        <a>E-Mail : </a><input type="email" name="email" required /><br/>
                        <input type="submit" name="submit" id="submit" /></form>
                </div>