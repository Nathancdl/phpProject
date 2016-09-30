
		<?php 
    

 if($pseudo['status'] == 2)
        { ?>
                      
                       <div class="col-md-10">

		  			<div class="content-box-large">
		  				<div class="panel-body">
		  					<div class="row">
                       
                       <?php
echo "<h1>Place disponible</h1>";
$requeteb = $bdd->query("SELECT * FROM places WHERE busy = 0");
while($tempsss = $requeteb->fetch())
{
     echo " <button class='btn btn-success btn-lg'>".$tempsss['numplace']."</button>
            ";
}

echo "<h1>Place occupé</h1>";

$requetea = $bdd->query("SELECT * FROM places WHERE busy = 1");
while($tempss = $requetea->fetch())
{
     echo " <button class='btn btn-danger btn-lg'>".$tempss['numplace']."</button>
                    
                    
                    ";
} ?>
                       
		  						
		  					</div>
		  				</div>
		  			</div>


		  </div>
		

    

   
  <?php
 }else {
        
        header("Location: ../index.php"); }   ?>