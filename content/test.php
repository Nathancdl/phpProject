      <?php 

          if(isset($_SESSION['connecte']))
          {
                $requete = $bdd->query("SELECT * FROM reservations
                                WHERE id_u = ".$_SESSION['id']);
                                $info=$requete->fetch();   
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
                //==================
                var mois_fr = new Array('Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre');
 
                 
 
               
               
                
                
                var texte = "Encore <strong>" +d_restants+ " jours</strong> <strong>" +H_restantes+ " heures</strong>" +
                         " <strong>" +i_restantes+ " minutes</strong> et <strong>" +s_restantes+ "s</strong> d'abonnement";
                
                
                
               
 

                document.getElementById("affichage").innerHTML = texte;
                 
                
                
                        // var desabo = "/* $desabo=$bdd->query('UPDATE user set dateabo =0, finabo =0, premium = 0 WHERE id_u ='.$_SESSION['id'].'')?>";
                    
			}

		</script>
       
           
           
           
       
       <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        

			     <script type='text/javascript'>setInterval(CompteARebours, 1); </script>
				        <p id="affichage" style="color:black;"> DYLAN TA LE SEUM JE SUIS TROP FORT wSH</p>
                      
                    
             
       