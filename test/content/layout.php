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
if(isset($_SESSION['connecte']))
{
                         $requetezer = $bdd->query("SELECT * FROM users WHERE id_u  = ".$_SESSION['id']."");
                            $pseudo = $requetezer->fetch();
}

 if($pseudo['status'] == 2)
        { ?>

<!DOCTYPE html>
<html>
  <head>
    <title>Admin Panel</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="css/styles.css" rel="stylesheet">
    <link href="css/stats.css" rel="stylesheet">
    <link href="css/buttons.css" rel="stylesheet">
    <link href="css/calendar.css" rel="stylesheet">
    
    
     <link href="css/jquery-ui.css" rel="stylesheet" media="screen">

    <!-- Bootstrap -->
    
    <link href="vendors/fullcalendar/fullcalendar.css" rel="stylesheet" media="screen">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link href="vendors/form-helpers/css/bootstrap-formhelpers.min.css" rel="stylesheet">
    <link href="vendors/select/bootstrap-select.min.css" rel="stylesheet">
    <link href="vendors/tags/css/bootstrap-tags.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  	<div class="header">
	     <div class="container">
	        <div class="row">
	           <div class="col-md-5">
	              <!-- Logo -->
	              <div class="logo">
	                 <h1><a href="index.php">Admin Panel</a></h1>
	              </div>
	           </div>
	           
	           <div class="col-md-6">
	              <div class="navbar navbar-inverse" role="banner">
	                  <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
	                    <ul class="nav navbar-nav">
	                      <li class="dropdown">
	                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Mon compte <b class="caret"></b></a>
	                        <ul class="dropdown-menu animated fadeInUp">
	                          <li><a href="../index.php?page=compte.php">Profile</a></li>
	                          <li><a href="../index.php?page=accueil.php">Back to Website</a></li>
	                          <li><a href="../index.php?page=logout.php">Logout</a></li>
	                        </ul>
	                      </li>
	                    </ul>
	                  </nav>
	              </div>
	           </div>
	        </div>
	     </div>
	</div>

    <div class="page-content">
    	<div class="row">
		  <div class="col-md-2">
		  	<div class="sidebar content-box" style="display: block;">
                <ul class="nav">
                    <!-- Main menu -->
                    <li class="current"><a href="index.php"><i class="glyphicon glyphicon-home"></i> Accueil</a></li>
                    <li><a href="index.php?page=calendar.php"><i class="glyphicon glyphicon-calendar"></i>Places</a></li>
                   
                    <li><a href="index.php?page=tables.php"><i class="glyphicon glyphicon-list"></i>Users</a></li>
                    <li class="dropdown">
	                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Mon compte <b class="caret"></b></a>
	                        <ul class="dropdown-menu animated fadeInUp">
	                          <li><a href="../index.php?page=compte.php">Profile</a></li>
	                          <li><a href="../index.php?page=accueil.php">Back to Website</a></li>
	                          <li><a href="../index.php?page=logout.php">Logout</a></li>
	                        </ul>
	                      </li>
	                    </ul>
                   
                   
                </ul>
             </div>
		  </div>
		           <?php 
                            require $contenu; 
                       ?>
        </div>
      </div>
    <footer>
         <div class="container">
         
            <div class="copy text-center">
              Copyright &copy; | Oxen & Co
            </div>
            
         </div>
      </footer>
      
    <link rel="stylesheet" type="text/css" href="vendors/bootstrap-wysihtml5/src/bootstrap-wysihtml5.css"></link>
    <script src="js/jquery.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="vendors/bootstrap-wysihtml5/lib/js/wysihtml5-0.3.0.js"></script>
    <script src="vendors/bootstrap-wysihtml5/src/bootstrap-wysihtml5.js"></script>
    <script src="vendors/ckeditor/ckeditor.js"></script>
    <script src="vendors/ckeditor/adapters/jquery.js"></script>
    <script type="text/javascript" src="vendors/tinymce/js/tinymce/tinymce.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/editors.js"></script>
    <script src="vendors/fullcalendar/fullcalendar.js"></script>
    <script src="vendors/fullcalendar/gcal.js"></script>
    <script src="js/calendar.js"></script>
    <script src="vendors/form-helpers/js/bootstrap-formhelpers.min.js"></script>
    <script src="vendors/select/bootstrap-select.min.js"></script>
    <script src="vendors/tags/js/bootstrap-tags.min.js"></script>
    <script src="vendors/mask/jquery.maskedinput.min.js"></script>
    <script src="vendors/moment/moment.min.js"></script>
    <script src="vendors/wizard/jquery.bootstrap.wizard.min.js"></script>
    <link href="vendors/bootstrap-datetimepicker/datetimepicker.css" rel="stylesheet">
    <script src="vendors/bootstrap-datetimepicker/bootstrap-datetimepicker.js"></script>
    <link href="css/bootstrap-editable.css" rel="stylesheet"/>
	<script src="js/bootstrap-editable.min.js"></script>
    <script src="js/forms.js"></script>
    <link rel="stylesheet" href="vendors/morris/morris.css">
    <script src="vendors/jquery.knob.js"></script>
    <script src="vendors/raphael-min.js"></script>
    <script src="vendors/morris/morris.min.js"></script>
    <script src="vendors/flot/jquery.flot.js"></script>
    <script src="vendors/flot/jquery.flot.categories.js"></script>
    <script src="vendors/flot/jquery.flot.pie.js"></script>
    <script src="vendors/flot/jquery.flot.time.js"></script>
    <script src="vendors/flot/jquery.flot.stack.js"></script>
    <script src="vendors/flot/jquery.flot.resize.js"></script>
    <script src="js/stats.js"></script>
    <link href="vendors/datatables/dataTables.bootstrap.css" rel="stylesheet" media="screen">
    <script src="vendors/datatables/js/jquery.dataTables.min.js"></script>
    <script src="vendors/datatables/dataTables.bootstrap.js"></script>
    <script src="js/tables.js"></script>
  </body>
</html>

      <?php
 }else {
        
        header("Location: ../index.php"); }   ?>