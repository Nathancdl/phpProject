


        <h1>Bienvenue sur l'espace administrateur</h1>

        <div>
          <a href="index.php?page=gestionuser.php">  <input type="submit"  value="Gerer les utilisateurs"></a> <!--lien vers la gestion des utilisateurs -->
             <a href="index.php?page=gestionplace.php">  <input type="submit" value="Gerer les places de parking"></a> <!--lien vers la gestion des places -->

        </div>
<?php

/*

$nb_a_tirer = 4;
$val_min = 1;
$val_max = 8;
$tab_result = array();
while($nb_a_tirer != 0 )
{
    $nombre = mt_rand($val_min, $val_max);
    if( !in_array($nombre, $tab_result) )
    {
        $tab_result[] = $nombre;
        $nb_a_tirer--;
    }
}

$requete = $pdo->query('SELECT * FROM logements WHERE id_logement ="'.$tab_result['0'].'"');
$titre = $requete->fetch();

$requete = $pdo->query('SELECT source FROM photos WHERE id_logement ='.$tab_result['0'].' AND alaune=1');
$photos = $requete->fetch();


$requete = $pdo->query('SELECT prenom FROM users u, logements l WHERE l.id_logement ="'.$tab_result['0'].'" AND u.id = l.id_proprio');
$proprio = $requete->fetch();

$requete = $pdo->query('SELECT lib_type FROM types  WHERE id_type ='.$titre['type']);
$type = $requete->fetch();




?>
    <form class="form-vertical">
        <legend>Legende :</legend>
        <div class="form-group" id="btn-default">



            <h2><?php echo $titre['nom_logement'] ?></h2> <p>Ce bien proposé par <?php echo $proprio['prenom'] ?></p>
            <a href="watch.php/?mov=<?php echo $titre['id_logement']?>"><img  src="<?php echo $photos['source']; ?>"/></a>
            <p class="btn btn-default">Surface : <?php echo $titre['surface'] ?> m²</p>
            <p class="btn btn-default">Nombre de pieces : <?php echo $titre['nb_pieces'] ?> </p>
            <p class="btn btn-default">Type de logement : <?php echo $type['lib_type'] ?></p>
            <p class="btn btn-default">Localisation : <?php echo $titre['ville'] ?></p>
            <p class="btn btn-default">Description : <?php echo $titre['description'] ?></p>
            <p class="btn btn-default">Prix : <?php echo $titre['prix'] ?></p>
            <p class="btn btn-default">Annonce émise le : <?php echo $titre['date'] ?></p>
        </div>
    </form>








<?php
$requete = $pdo->query('SELECT * FROM logements WHERE id_logement ="'.$tab_result['1'].'"');
$titre = $requete->fetch();

$requete = $pdo->query('SELECT source FROM photos WHERE id_logement ='.$tab_result['1'].' AND alaune=1');
$photos = $requete->fetch();

$requete = $pdo->query('SELECT prenom FROM users u, logements l WHERE l.id_logement ="'.$tab_result['1'].'" AND u.id = l.id_proprio');
$proprio = $requete->fetch();

$requete = $pdo->query('SELECT lib_type FROM types  WHERE id_type ='.$titre['type']);
$type = $requete->fetch();



?>

    <form class="form-vertical">
        <legend>Legende :</legend>
        <div class="form-group" id="btn-default">



            <h2><?php echo $titre['nom_logement'] ?></h2> <p>Ce bien proposé par <?php echo $proprio['prenom'] ?></p>
            <a href="watch.php/?mov=<?php echo $titre['id_logement']?>"><img  src="<?php echo $photos['source']; ?>"/></a>
            <p class="btn btn-default">Surface : <?php echo $titre['surface'] ?> m²</p>
            <p class="btn btn-default">Nombre de pieces : <?php echo $titre['nb_pieces'] ?> </p>
            <p class="btn btn-default">Type de logement : <?php echo $type['lib_type'] ?></p>
            <p class="btn btn-default">Localisation : <?php echo $titre['ville'] ?></p>
            <p class="btn btn-default">Description : <?php echo $titre['description'] ?></p>
            <p class="btn btn-default">Prix : <?php echo $titre['prix'] ?></p>
            <p class="btn btn-default">Annonce émise le : <?php echo $titre['date'] ?></p>

        </div>
    </form>


<?php
$requete = $pdo->query('SELECT * FROM logements WHERE id_logement ="'.$tab_result['2'].'"');
$titre = $requete->fetch();

$requete = $pdo->query('SELECT source FROM photos WHERE id_logement ='.$tab_result['2'].' AND alaune=1');
$photos = $requete->fetch();

$requete = $pdo->query('SELECT prenom FROM users u, logements l WHERE l.id_logement ="'.$tab_result['2'].'" AND u.id = l.id_proprio');
$proprio = $requete->fetch();


$requete = $pdo->query('SELECT lib_type FROM types  WHERE id_type ='.$titre['type']);
$type = $requete->fetch();


?>

    <form class="form-vertical">
        <legend>Legende :</legend>
        <div class="form-group" id="btn-default">

            <h2><?php echo $titre['nom_logement'] ?></h2> <p>Ce bien proposé par <?php echo $proprio['prenom'] ?></p>
            <a href="watch.php/?mov=<?php echo $titre['id_logement']?>"><img  src="<?php echo $photos['source']; ?>"/></a>
            <p class="btn btn-default">Surface : <?php echo $titre['surface'] ?> m²</p>
            <p class="btn btn-default">Nombre de pieces : <?php echo $titre['nb_pieces'] ?> </p>
            <p class="btn btn-default">Type de logement : <?php echo $type['lib_type'] ?></p>
            <p class="btn btn-default">Localisation : <?php echo $titre['ville'] ?></p>
            <p class="btn btn-default">Description : <?php echo $titre['description'] ?></p>
            <p class="btn btn-default">Prix : <?php echo $titre['prix'] ?></p>
            <p class="btn btn-default">Annonce émise le : <?php echo $titre['date'] ?></p>



        </div>
    </form>


<?php
$requete = $pdo->query('SELECT * FROM logements WHERE id_logement ="'.$tab_result['3'].'"');
$titre = $requete->fetch();

$requete = $pdo->query('SELECT source FROM photos WHERE id_logement ='.$tab_result['3'].' AND alaune=1');
$photos = $requete->fetch();

$requete = $pdo->query('SELECT prenom FROM users u, logements l WHERE l.id_logement ="'.$tab_result['3'].'" AND u.id = l.id_proprio');
$proprio = $requete->fetch();


$requete = $pdo->query('SELECT lib_type FROM types  WHERE id_type ='.$titre['type']);
$type = $requete->fetch();

?>

    <form class="form-vertical">
        <legend>Legende :</legend>
        <div class="form-group" id="btn-default">

            <h2><?php echo $titre['nom_logement'] ?></h2> <p>Ce bien proposé par <?php echo $proprio['prenom'] ?></p>
            <a href="watch.php/?mov=<?php echo $titre['id_logement']?>"><img  src="<?php echo $photos['source']; ?>"/></a>
            <p class="btn btn-default">Surface : <?php echo $titre['surface'] ?> m²</p>
            <p class="btn btn-default">Nombre de pieces : <?php echo $titre['nb_pieces'] ?> </p>
            <p class="btn btn-default">Type de logement : <?php echo $type['lib_type'] ?></p>
            <p class="btn btn-default">Localisation : <?php echo $titre['ville'] ?></p>
            <p class="btn btn-default">Description : <?php echo $titre['description'] ?></p>
            <p class="btn btn-default">Prix : <?php echo $titre['prix'] ?></p>
            <p class="btn btn-default">Annonce émise le : <?php echo $titre['date'] ?></p>


        </div>
    </form>




<?php require 'inc/footer.php'; ?>
*/
    ?>