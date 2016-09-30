<?php if($pseudo['status'] == 2)
        { ?>

            <div class="gu">
                <TABLE BORDER="1">
                <CAPTION> Liste des utilisateurs Non Validés </CAPTION>
                <TR>
                    <TH> Id </TH>
                    <TH> Nom </TH>
                    <TH> Prenom </TH>
                    <TH> Login </TH>
                    <TH> Password</TH>
                    <TH> E-mail </TH>
                    <TH> Statut</TH>
                    <TH> date attente </TH>
                    <TH> Supprimer </TH>
                </TR>
            <?php

    $requetez = $bdd->query("SELECT * FROM users where status = 0");
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

                    <TD align="center"><a href="delete.php?id="<?php echo $donn['id_u']; ?> onclick="return confirm('êtes-vous sûr de vouloir supprimer cet utilisateur ?')" >x</a></TD>
                    </TR>
                    <?php


                }






?>
<h1>Gerer utilisateurs<h1>






    <div class="gu">
        <TABLE BORDER="1">
            <CAPTION> Liste des utilisateurs Validés </CAPTION>
            <TR>
                <TH> Id </TH>
                <TH> Nom </TH>
                <TH> Prenom </TH>
                <TH> Login </TH>
                <TH> Password</TH>
                <TH> E-mail </TH>
                <TH> Statut</TH>
                <TH> date attente </TH>
                <TH> Supprimer </TH>
            </TR>

     <?php
    $times = time();
    
    
    $requetea = $bdd->query("SELECT * FROM reservations WHERE date_fin < '$times'");
    while ($temps = $requetea->fetch()){

    
   echo $temps['date_fin']."<br>";
   } 

    echo time()."<br>";
    $tps_restant = $temps['date_fin'] - time();
    
    
                $reponse = $bdd->query('SELECT * FROM users where status != 0');
                while ($donnees = $reponse->fetch())
                {
                    echo "</TR>
                    <TD align='center'> $donnees[id_u] </TD>
                    <TD align='center'> $donnees[nom] </TD>
                    <TD align='center'> $donnees[prenom] </TD>
                    <TD align='center'> $donnees[login] </TD>
                    <TD align='center'> $donnees[mdp] </TD>
                    <TD align='center'> $donnees[email] </TD>
                    <TD align='center'> $donnees[status] </TD>
                    <TD align='center'> $donnees[date_attente] </TD>

                    <TD align='center'><a href='delete.php?id=".$donnees['id_u']."' "?>onclick='return confirm("êtes-vous sûr de vouloir supprimer cet utilisateur ?")' <?php echo"'>x</a></TD>
                    </TR>";


                }
                $reponse->closeCursor();
           
echo "       </TABLE>
    </div>";         }

else {
        
        header("Location: index.php"); }   ?>
 