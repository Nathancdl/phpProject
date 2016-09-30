 

               
  <div class="container">
  <h1>Réservation</h1>
<?php

if($pseudo['status'] > 0)
        { 


if(isset($_POST['submit']))
	{
    
    $dateactuel = time();
    
    $recherche = $bdd->query('SELECT * FROM places
                                 WHERE busy = 0');
    $donnee =  $recherche->fetch();
    
    $datefin = $dateactuel + 86400;
   
    
    if(!$donnee)
    {
        $attente = $bdd->query("UPDATE users set date_attente=".$dateactuel.", attente = 1 WHERE id_u =".$_SESSION['id']);
       $result = $attente->fetch();
        
        echo "<h1>vous etes en liste d'attente</h1>";
        
        }
    else
    {
        $placement = $bdd->query("INSERT INTO reservations(date_debut,date_fin,id_u,id_p) VALUES(".$dateactuel.",".$datefin.",".$_SESSION['id'].",".$donnee['id_p'].")");
        $placer = $bdd->query("SELECT * FROM reservations WHERE id_r = LAST_INSERT_ID()");
        $placerr = $placer->fetch();
        if($placement)
        {
              $placement1 = $bdd->query("UPDATE places set id_u =".$_SESSION['id']." , busy = 1, id_r = ".$placerr['id_r']." WHERE id_p = ".$donnee['id_p']);
            echo "<h1>vous êtes a la place numero ".$donnee['id_p']." Merci !</h1>  ";
        }else echo "<h1>Vous êtes déjà placé ou dans une file d'attente.</h1>";
       
      }} ?>
            
            
<?php




if(isset($_POST['submitt']))
	{
    
    $dateactuel = time();
    
    $recherche = $bdd->query('SELECT * FROM places
                                 WHERE busy = 0');
    $donnee =  $recherche->fetch();
    
    $datefin = $dateactuel + 172800;
   
    
    if(!$donnee)
    {
        $attente = $bdd->query("UPDATE users set date_attente=".$dateactuel.", attente = 1 WHERE id_u =".$_SESSION['id']);
       $result = $attente->fetch();
        
        echo "<h1>vous etes en liste d'attente</h1>";
        
        }
    else
    {
        $placement = $bdd->query("INSERT INTO reservations(date_debut,date_fin,id_u,id_p) VALUES(".$dateactuel.",".$datefin.",".$_SESSION['id'].",".$donnee['id_p'].")");
        $placer = $bdd->query("SELECT * FROM reservations WHERE id_r = LAST_INSERT_ID()");
        $placerr = $placer->fetch();
        if($placement)
        {
              $placement1 = $bdd->query("UPDATE places set id_u =".$_SESSION['id']." , busy = 1, id_r = ".$placerr['id_r']." WHERE id_p = ".$donnee['id_p']);
            echo "<h1>vous êtes a la place numero ".$donnee['id_p']." Merci !</h1>  ";
        }else echo "<h1>Vous êtes déjà placé ou dans une file d'attente.</h1>";
       
      }} ?>
            
            
<?php




if(isset($_POST['submittt']))
	{
    
    $dateactuel = time();
    
    $recherche = $bdd->query('SELECT * FROM places
                                 WHERE busy = 0');
    $donnee =  $recherche->fetch();
    
    $datefin = $dateactuel + 259200;
   
    
    if(!$donnee)
    {
        $attente = $bdd->query("UPDATE users set date_attente=".$dateactuel.", attente = 1 WHERE id_u =".$_SESSION['id']);
       $result = $attente->fetch();
        
        echo "<h1>vous etes en liste d'attente</h1>";
        
        }
    else
    {
        $placement = $bdd->query("INSERT INTO reservations(date_debut,date_fin,id_u,id_p) VALUES(".$dateactuel.",".$datefin.",".$_SESSION['id'].",".$donnee['id_p'].")");
        $placer = $bdd->query("SELECT * FROM reservations WHERE id_r = LAST_INSERT_ID()");
        $placerr = $placer->fetch();
        if($placement)
        {
              $placement1 = $bdd->query("UPDATE places set id_u =".$_SESSION['id']." , busy = 1, id_r = ".$placerr['id_r']." WHERE id_p = ".$donnee['id_p']);
            echo "<h1>vous êtes a la place numero ".$donnee['id_p']." Merci !</h1>  ";
        }else echo "<h1>Vous êtes déjà placé ou dans une file d'attente.</h1>";
       
      }} ?>

           
     <div class="row">
            <div class="col-lg-12">
                <h3>Nos offres</h3>
            </div>
        </div>
        <!-- /.row -->

        <!-- Page Features -->
        <div class="row text-center">

            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="img/24.png" alt="">
                    <div class="caption">
                        <h3>24H</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        <p><form action='#' method='post'>
                            <input class="btn btn-primary" type='submit' name='submit' value="Reserver"></input> 
                             </form>
                            <a href="#" class="btn btn-default">More Info</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="img/48.png" alt="">
                    <div class="caption">
                        <h3>48H</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        <p><form action='#' method='post'>
                        <input class="btn btn-primary" type='submit' name='submitt' value="Reserver"></input> </form>
                            <a href="#" class="btn btn-default">More Info</a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="img/72.png" alt="">
                    <div class="caption">
                        <h3>72H</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        <p><form action='#' method='post'>
                        <input class="btn btn-primary" type='submit' name='submittt' value="Reserver"></input> </form>
                            <a href="#" class="btn btn-default">More Info</a>
                        </p>
                    </div>
                </div>
            </div>
            </div>
</div>
                
               <?php
 }else {
        echo "<div class='container'><h1>Vous n'avez pas accès au reservation tant que votre compte n'est pas validé par un admin!</h1></div>";
       }   ?>