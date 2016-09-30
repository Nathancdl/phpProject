<?php 
   


 if($pseudo['status'] == 2)
        { 

if(isset($_GET['add']))
	{
		$delete = $bdd->query("UPDATE users set status = 1 where id_u=".(int)$_GET['add']);
	}
     
         
if(isset($_GET['del']))
	{
		$delete = $bdd->query("DELETE FROM users where id_u=".(int)$_GET['del']);
	}
?>
		  <div class="col-md-10">

		  	<div class="row">
  				

  		

  			<div class="content-box-large">
  				<div class="panel-heading">
					<div class="panel-title">Users non validé</div>
				</div>
  				<div class="panel-body">
  					<div class="table-responsive">
  						<table class="table">
			              <thead>
			                <tr>
			                  <th>#</th>
			                 
			                 
			                  <th>Nom</th>
			                  <th>Prenom</th>
			                  <th>login</th>
			                  <th>MDP</th>
			                  <th>E-mail</th>
			                 <th>Temps d'attente</th>
			                  <th>Attente</th>
			                  <th>Valider</th>
			                  <th>Supprimer</th>
			                  
			                </tr>
			              </thead>
			              <tbody>
                         <?php

    $requetez = $bdd->query("SELECT * FROM users WHERE status = 0");
    while ($donn = $requetez->fetch())
                {
                    ?>
                    <TR>
                    <TD align="center"> <?php echo $donn['id_u']; ?></TD>
                    <TD align="center"> <?php echo $donn['nom']; ?></TD>
                    <TD align="center"> <?php echo $donn['prenom']; ?></TD>
                    <TD align="center"> <?php echo $donn['login']; ?></TD>
                    <TD align="center"> <?php echo $donn['mdp']; ?></TD>
                    <TD align="center"> <?php echo $donn['email']; ?></TD>
                    <TD align="center"> <?php echo $donn['date_attente']; ?></TD>
                     <TD align="center"> <?php echo $donn['attente']; ?></TD>
                     
                     <?php
                        
                        echo "<TD align='center'><a href='index.php?page=tables.php&add=".$donn['id_u']."' "?>onclick='return confirm("êtes-vous sûr de vouloir valider cet utilisateur ?")' <?php echo"'><button class='btn btn-success btn-sm'>X</button></a></TD>";
                        ?>
                        
                        <?php
                        
                        echo "<TD align='center'><a href='index.php?page=tables.php&del=".$donn['id_u']."' "?>onclick='return confirm("êtes-vous sûr de vouloir supprimer cet utilisateur ?")' <?php echo"'><button class='btn btn-danger btn-sm'>X</button></a></TD>";



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
  				

  		

  			<div class="content-box-large">
  				<div class="panel-heading">
					<div class="panel-title">Users validé</div>
				</div>
  				<div class="panel-body">
  					<div class="table-responsive">
  						<table class="table">
			              <thead>
			                <tr>
			                  <th>#</th>
			                 
			                  <th>Login</th>
			                  <th>Prenom</th>
			                  <th>Nom</th>
			                  <th>MDP</th>
			                  <th>E-mail</th>
			                  <th>Status</th>
			                  <th>Temps d'attente</th>
			                  <th>Attente</th>
			                  <th>Supprimer</th>
			                  
			                </tr>
			              </thead>
			              <tbody>
                         <?php

    $requetez = $bdd->query("SELECT * FROM users WHERE status > 0");
    while ($donn = $requetez->fetch())
                {
                    ?>
                    <TR>
                    <TD align="center"> <?php echo $donn['id_u']; ?></TD>
                    <TD align="center"> <?php echo $donn['nom']; ?></TD>
                    <TD align="center"> <?php echo $donn['prenom']; ?></TD>
                    <TD align="center"> <?php echo $donn['login']; ?></TD>
                    <TD align="center"> <?php echo $donn['mdp']; ?></TD>
                    <TD align="center"> <?php echo $donn['email']; ?></TD>
                    <TD align="center"> <?php echo $donn['status']; ?></TD>
                    <TD align="center"> <?php echo $donn['date_attente']; ?></TD>
                    <TD align="center"> <?php echo $donn['attente']; ?></TD>
                <?php
                     echo "<TD align='center'><a href='index.php?page=tables.php&del=".$donn['id_u']."' "?>onclick='return confirm("êtes-vous sûr de vouloir supprimer cet utilisateur ?")' <?php echo"'><button class='btn btn-danger btn-sm'>X</button></a></TD>";?>

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


            


    <?php
 }else {
        
        header("Location: ../index.php"); }   ?>