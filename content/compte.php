<h1>coucou</h1>
<?php 
if(isset($_SESSION['connecte']))
{

   

          
          
                $requeteserr = $bdd->query("SELECT * FROM reservations
                                WHERE id_u = ".$_SESSION['id']);
                                $info=$requeteserr->fetch();   
          

    $requeteres = $bdd->query("SELECT * FROM reservations
                                WHERE id_u = ".$_SESSION['id']);
                                $info=$requeteres->fetch();   
          
    
    $requetePf = $bdd->query("SELECT * FROM users WHERE id_u =".$_SESSION['id']);
    $donneePf = $requetePf->fetch();
    $requeteR = $bdd->query("SELECT * FROM reservations WHERE id_u =".$_SESSION['id']);
    $donneeR = $requeteR->fetch(); 
    $requetePl = $bdd->query("SELECT * FROM places WHERE id_u =".$_SESSION['id']);
    $donneePl = $requetePl->fetch();


             if(isset($_POST['modifuser']))
                {
                    $mdp = sha1($_POST['mdp']);
                    $email = $_POST['email'];


                        if(!empty($_POST['mdp']))
                        {
                             $requetek = $bdd->prepare('UPDATE users set mdp = :mdp WHERE id_u ='.$_SESSION['id'].'');
                            $requetek->bindValue(":mdp",$mdp,PDO::PARAM_STR);
                            $requetek->execute();
                        }


                        echo '<script language="Javascript">
                            <!--
                            document.location.replace("index.php?page=accueil.php");
                            // -->
                            </script>';
                           
                            }
}

                       
                    ?>

<div class="container" >
    <div class="row" style="margin-top: 50px;">

        <div class="col-md-5 panel">
<h2 style="font-size: 30px;">Mon Profil</h2>

<div class="">
<form action='#' method='post' enctype='multipart/form-data' class='formaccount'>
<label for="login">Nom d'utilisateur : </label><?php echo " ".$donneePf['login']; ?><br>

<input style="margin-bottom: 10px;" type='password' name='mdp' placeholder="Mot de passe"><br>
<input style="margin-bottom: 10px;" type='email' name='email' placeholder="Email" value="<?php echo $donneePf['email']; ?>"><br>
    <input style="margin-bottom: 10px;" class='btn btn-primary btn-primary' type='submit' name='modifuser' id='modifuser' value="SUBMIT"/></br>
		

<label for="prenom">Votre prenom : </label><?php echo " ".$donneePf['prenom']; ?><br>
<label for="nom">Votre nom : </label><?php echo  " ".$donneePf['nom']; ?><br></form>
</div>
        </div>


    <div class="col-md-6 col-md-offset-1 panel">
        <h2>Mes places</h2>
        <p id="affichage" style="color:black;"></p>
        
        <h2>Annuler ma réservation</h2>
         <?php
        if(isset($_GET['del']))
	{
            
           
		
             $requetezi = $bdd->query("SELECT * FROM users WHERE id_u = ".(int)$_GET['del']);
             $donneeattente = $requetezi->fetch();
            if($donneeattente['attente'] = 1)
            {
                 $erases = $bdd->query("UPDATE users set attente = 0, date_attente = 0 WHERE id_u = ".$_SESSION['id']);
                         
            }
            
            else{
                 $requetezii = $bdd->query("SELECT * FROM reservations WHERE id_u = ".$_SESSION['id']);
                 $donneeattenti = $requetezii->fetch();
                 $erase = $bdd->query("UPDATE places set busy = 0 , id_r = 0
                                                WHERE id_r = ".$donneeattenti['id_r']);
                    
                $deletee = $bdd->query("DELETE from reservations  
                                                WHERE id_u = ".(int)$_GET['del']);
                
            }
            
	   }
                     echo "<TD align='center'><a href='index.php?page=compte.php&del=".$_SESSION['id']."' "?>onclick='return confirm("êtes-vous sûr de vouloir annuler votre reservation ?")' <?php echo"'><button class='btn btn-danger btn-sm'>X</button></a></TD>";?>

    </div>



<div class="col-md-12 panel">

		  	<div class="row">
  				

 <?php 
    
    
    if($donneePf['status'] != 0)
    {
                
                ?> 		

  			<div class="content-box-large">
  				<div class="panel-heading">
                    <div class="panel-title text-center"><h2>Historique de mes réservations</h2></div>
				</div>
  				<div class="panel-body">
  					<div class="table-responsive">
  						<table class="table">
			              <thead>
			                <tr>
			                  <th>#</th>
			                 
			                  <th>Date de debut</th>
			                  <th>Date de fin</th>
			                  <th>Places</th>
			                  
			                  
			                </tr>
			              </thead>
			              <tbody>
                         <?php

    $requetez = $bdd->query("SELECT * FROM historique WHERE  id_u =".$_SESSION['id']);
    while ($donn = $requetez->fetch())
                {
                    ?>
                    <TR>
                        <TD align="center">
                            <?php echo $donn['id_h']; ?>
                        </TD>
                        <TD align="center">
                            <?php   $debut = $donn['date_debut'];
                            $startTimed = new DateTime("1970-01-01");
                            $startTimed->modify('+'.$debut.'seconds');
                            $startTimed->modify('+7200 seconds');
                            echo $startTimed->format('d-m-Y H:i:s') . "\n";
                            ?>
                        </TD>
                        <TD align="center">
                            <?php $fin = $donn['date_fin'];
                            $startTimef = new DateTime("1970-01-01");
                            $startTimef->modify('+'.$fin.'seconds');
                            $startTimef->modify('+7200 seconds');
                            echo $startTimef->format('d-m-Y H:i:s') . "\n" ?>
                        </TD>
                        <TD align="center">
                            <?php echo $donn['id_p']; ?>
                        </TD>
                    </TR>
               <?php

                }
                ?>

			                
			              </tbody>
			            </table>
  					</div>
  				</div>
                </div>
  		



    </div>
</div>














<div class="col-md-10">

		  	<div class="row">

<?php
    $recherche = $bdd->query("SELECT * FROM places
                                 WHERE id_u =".$_SESSION['id']);
    $myplace =  $recherche->fetch();
    $recherche1 = $bdd->query("SELECT * FROM users
                                 WHERE id_u =".$_SESSION['id']."
                                    AND attente = 1 ");
    $mywait =  $recherche1->fetch();
    $recherche2 = $bdd->query("SELECT * FROM users
                                 WHERE id_u =".$_SESSION['id']."
                                    AND attente = 0 ");
    $mynothing =  $recherche2->fetch();
    
    
    if($myplace && !$mywait && !$mynothing){
    
    echo "<h1>vous êtes a la place numero ".$myplace['id_p']." !</h1>  ";}
   
    if($mywait && !$myplace && !$mynothing)
    {
         echo "<h1>vous êtes sur liste d'attente !</h1>  ";
    }
    
    if($mynothing && !$myplace && !$mywait)
    {
         echo "<h1>Vous ne possedez ni reservation ni place</h1>  ";}
    
        

?>

    </div>
</div>    
</div>
    </div>
<?php }
    else {
        echo "Votre compte n'a toujours pas été validé par l'administrateur";
    
    }  
            ?>
     <script type="text/javascript">
			
           function CompteARebours()
			{
               
                
                var tps_actuel = new Date();
                var tps_restant = ((<?php echo $info['date_fin']; ?>) - (tps_actuel.getTime()/1000) ) ;
                
                var dateabo = new Date(<?php echo $info['date_debut']; ?> * 1000);
                
                var s_restantes = tps_restant; // On convertit en secondes
                var i_restantes = s_restantes / 60;
                var H_restantes = i_restantes / 60;
                var d_restants  = H_restantes / 24;
 
                s_restantes = Math.floor(s_restantes % 60); // Secondes restantes
                i_restantes = Math.floor(i_restantes % 60); // Minutes restantes
                H_restantes = Math.floor(H_restantes % 24); // Heures restantes
                d_restants = Math.floor(d_restants); // Jours restants
               
                
                var texte = "Encore <strong>" +d_restants+ " jours</strong> <strong>" +H_restantes+ " heures</strong>" +
                         " <strong>" +i_restantes+ " minutes</strong> et <strong>" +s_restantes+ "s</strong> d'abonnement";

                document.getElementById("affichage").innerHTML = texte;}

		</script>
       
			     <script type='text/javascript'>setInterval(CompteARebours, 1); </script>
				        
                      
                    
             
          
