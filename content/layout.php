
<?php 
    session_start();
                            try
                            {
                                $bdd = new PDO("mysql:host=localhost;dbname=parking;charset=utf8","root","");
                            }
                            catch(Exception $e)
                            {
                                die("erreur de connection");
                            }



                               if(isset($_POST['connect']))
                                {
                                    $login = $_POST['login'];
                                    $mdp = sha1($_POST['mdp']);

                                    $requete = $bdd->query("SELECT * FROM users 
                                                            WHERE login ='".$login."' 
                                                            AND mdp ='".$mdp."'");

                                    if($reponse = $requete->fetch())
                                    {
                                        $_SESSION['connecte'] = true;
                                        $_SESSION['id'] = $reponse['id_u'];
                                        header("location:index.php?page=accueil.php");
        
			                             die();
                                         
                                    }
                                    else
                                    {
                                        echo "<div class='cant'>Nom d'utilisateur ou mot de passe incorect</div>";
                                    }
                                }
                                
                                
if(isset($_SESSION['connecte']))
{
                         $requetezer = $bdd->query("SELECT * FROM users WHERE id_u  = ".$_SESSION['id']."");
                            $pseudo = $requetezer->fetch();
}


 




 $times = time();

    $i = 0;
    $tabjntm = array();
    $j = 0;
    $requetea = $bdd->query("SELECT * FROM reservations WHERE date_fin < '$times'");
    while ($temps = $requetea->fetch())
    {
                    $tabjntm[$i] = $temps['id_r'];
                    $i++;
                    $j++;    
                    }

        for($i = 0; $i < $j; $i++) 
        {
         
             $erase = $bdd->query("UPDATE places set busy = 0 , id_r = 0
                                                WHERE id_r = ".$tabjntm[$i]);
            
            $histo = $bdd->query("SELECT * FROM reservations  WHERE id_r = ".$tabjntm[$i]);
                   $historique =  $histo->fetch();
           
            
            $placement = $bdd->query("INSERT INTO historique(date_debut,date_fin,id_u,id_p) VALUES(".$historique['date_debut'].",".$historique['date_fin'].",".$historique['id_u'].",".$historique['id_p'].")");
           
            
            $actu = $bdd->query("DELETE from reservations  
                                                WHERE id_r = ".$tabjntm[$i]);
            
            
                    $requetea = $bdd->query("SELECT id_u,date_attente FROM users WHERE (date_attente = (SELECT max(date_attente) from users)) and attente = 1");
                    $result = $requetea->fetch();

                    $dateactuel = time();
                    $recherche = $bdd->query('SELECT * FROM places WHERE busy = 0');
                   if($donnee =  $recherche->fetch())
                   {
                    $datefin = $dateactuel + 86400;
                    
                    $placement = $bdd->query("INSERT INTO reservations(date_debut,date_fin,id_u,id_p) VALUES(".$dateactuel.",".$datefin.",".$result['id_u'].",".$donnee['id_p'].")");

            $placett = $bdd->query("SELECT * FROM reservations WHERE id_r = LAST_INSERT_ID()");
            $placet = $placett->fetch();
            
                    $erase = $bdd->query("UPDATE places set busy = 1 , id_u = ".$result['id_u'].", id_r = ".$placet['id_r']." WHERE id_p = ".$donnee['id_p']);
                       $erases = $bdd->query("UPDATE users set attente = 0, date_attente = 0 WHERE id_u = ".$result['id_u']." ");
                        } }
   // $tps_restant = $temps['date_fin'] - time();
            ?>


<!DOCTYPE html>
<html>
	<head>  
	<title> King Park </title>
		<meta charset="utf-8" /><!-- encodage -->
		<meta name="author" content="OXEN;" /><!-- auteur -->
		<meta name="description" content="Test" /><!-- description du site -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="css/style.css" /><!-- lien vers le css-->
		<link href="css/font-awesome.css" rel="stylesheet">
		 <link rel="shortcut icon" href="img/favico.ico">
		 <link href="css/heroic-features.css" rel="stylesheet">
		 <link href="css/business-frontpage.css" rel="stylesheet">

	</head>    
<body>
       
           <header role="banner" class="navbar navbar-fixed-top navbar-inverse">
              <div class="container">
                <div class="navbar-header">
                  <button data-toggle="collapse-side" data-target=".side-collapse" data-target-2=".side-collapse-container" type="button" class="navbar-toggle pull-left"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                </div>
                <div class="navbar-inverse side-collapse in">
                  <nav role="navigation" class="navbar-collapse">
                   <a href="index.php?page=accueil.php"><img src="img/logo.png"/></a>
                    <ul class="nav navbar-nav pull-right">
                      <?php
                        if(!isset($_SESSION['connecte']))
                            {
                                echo "<li><a href='index.php?page=register.php' class='zoombox'>S'enregistrer</a></li>";
                                echo "<li><a href='index.php?page=oops.php' class='zoombox'>Mot de passe perdu ?</a></li>";
                                echo "<form action='#' method='post' class='connection'>
                                 
                                
								    <div class='col-sm-10'>
                                    <div class='blank' style='color:white;'>
								      Nom d'utilisateur : <input type='text' name='login' class='form-control' id='inputEmail3' placeholder='Login'>
                                      </div>
								    </div>
								
                                  
                                   
								    <div class='col-sm-10'>
                                    <div class='blank' style='color:white;'>
								      Mot de passe : <input type='password' name='mdp' class='form-control' id='inputPassword3' placeholder='Password'>
                                      </div>
								    </div>
								 
                                        <button class='btn btn-default btn-sm' style='margin-top:10px;' type='submit' name='connect'>Valider</button>  
                                       
                                          </form>";
                         }
                            else
                            {
                            if($pseudo['status'] == 2)
                             {
                                   echo "<li><a href='index.php?page=accueil.php'>Accueil</a></li>";
                                  echo "<li><a href='test/index.php'>Espace admin</a></li>";
                                   echo "<li><a href='index.php?page=compte.php'>Mon compte</a></li>";
                                echo "<li><a href='index.php?page=places.php'>Places</a></li>";
                                echo "<li><a href='index.php?page=resa.php'>Reservation</a></li>";
                             echo "<li><a href='index.php?page=logout.php'>Se deconnecter</a></li>";}
            
        
                             else {
                                  echo "<li><a href='index.php?page=accueil.php'>Accueil</a></li>";
                            echo "<li><a href='index.php?page=compte.php'>Mon compte</a></li>";
                                 echo "<li><a href='index.php?page=places.php'>Places</a></li>";
                             echo "<li><a href='index.php?page=resa.php'>Reservation</a></li>";
                             echo "<li><a href='index.php?page=logout.php'>Se deconnecter</a></li>";}}
    
                         ?>
                      
                      
                    </ul>
                  </nav>
                </div>
              </div>
            </header>
            
                   <div class="contenu">
                       
                       <?php 
                            require $contenu; 
                       ?>
                   </div>

        <footer>
  <div class="footer_top">
    <div class="doct"></div>
      <div class="col-md-5 bagcgrey">
        <div class="row">
          <div class="methodh4">
            <h4 style="margin-left: 10px;">Nous suivre</h4>
          </div>
       <ul class="social socmatpbo">
					            <li><a href="http://facebook.com"><img src="img/fb.png"></a></li>
					            <li><a href="http://twitter.fr"><img src="img/twitter.png"></a></li>
					            <li><a href="http://youtube.fr"><img src="img/yt.png"></a></li>
				            </ul>
         </div>
      </div>
      <div class="col-md-7 bagcblue">
        <div class="heading6">Copyright &copy; | oXEN & Co</div>
        <p></p>
      </div>
  </div>
</footer>
        
        <script>
    
            $(document).ready(function() {   
                    var sideslider = $('[data-toggle=collapse-side]');
                    var sel = sideslider.attr('data-target');
                    var sel2 = sideslider.attr('data-target-2');
                    sideslider.click(function(event){
                        $(sel).toggleClass('in');
                        $(sel2).toggleClass('out');
                    });
                });
            
        </script>
    
    </body>
</html>
