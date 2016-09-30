


 
                       
                       <?php


                        echo "<div class='container'>
                                   <div class='row panel' style='margin-top: 100px;'>
                                        <div class='col-md-10 col-md-offset-1'>
                                        <h1>Place disponible</h1>";

                       $requeteb = $bdd->query("SELECT * FROM places WHERE busy = 0");

                       while($tempsss = $requeteb->fetch())
                       {
                            echo " <button class='btn btn-success btn-lg' style='margin-right: 10px; margin-bottom: 10px;'>".$tempsss['numplace']."</button>";
                       }

                        echo "<h1>Place occupé</h1>";

                        $requetea = $bdd->query("SELECT * FROM places WHERE busy = 1");

                       while($tempss = $requetea->fetch())
                       {
                           echo " <button class='btn btn-danger btn-lg' style='margin-right: 10px; margin-bottom: 10px;'>".$tempss['numplace']."</button>";
                       }

                           echo "</div>
                            </div>
                         </div>"

                //    $tabj = array();
                //    $tt = 0;
                //    $i = 0;
                /*    $j = 0;
                    


      while($tempsss = $requeteb->fetch())
                     {
                         
                         $tabj[$i] = $tempsss['numplace'];
                          $tabtt[$i] = "green";
                         $i++;
                        $j++;
                     }
                    

                    while($tempss = $requetea->fetch())
                     {
                         $tabj[$i] = $tempss['numplace'];
                        $tabtt[$i] = "red";
                        $i++;
                        $j++;
                       
                     } 
            for($i = 0;$i < $j ;$i++) 
                    {
                
               
                 $actu = $bdd->query("SELECT * from places
                                                WHERE id_p = ".$tabj[$i]."
                                                ORDER BY numplace DESC");
                
                $caca = $actu->fetch();
                
                echo $caca[$i];
                
                
                
                  
            } */

        

?>

