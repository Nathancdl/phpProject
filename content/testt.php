 
<h1>salut</h1>
<?php
        $koukou = $bdd->query("SELECT * FROM((@rownum := @rownum + 1) UserRank (SELECT @rownum := 0)) users WHERE attente = 1 ORDER BY date_attente ASC");
   
    
    while($placea = $koukou->fetch())
      {
          echo $placea['id_u'];
      }

   

?>
    