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
               
                
                <div class="inscri col-md-offset-5 col-md-2 text-center panel">
                    <h4>MOT DE PASSE OUBLIE</h4>
                    <form action="#" method="post" enctype="multipart/form-data" class="inscrip">
                        <input style="width: 100%; margin-bottom: 10px;" type="text" name="login" placeholder="Login" required /><br/>
                        <input style="width: 100%; margin-bottom: 10px;" type="email" name="email" placeholder="Email" required /><br/>
                        <input class='btn btn-primary btn-primary' type='submit' name='submit' value="SUBMIT"/></br>
                    </form>
                </div>
                