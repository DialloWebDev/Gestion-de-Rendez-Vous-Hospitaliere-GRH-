<?php
session_start();
include('include/sidebar.php'); // Fichier PHP contenant la sidebar

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="main_admin.css">
<!--===============================================================================================-->

    <title>Admin | Accueil</title>
</head>
    <body>
    <div class="container">
        <div class="row">
                <div class="col-sm-12 entete">
                    <h3>Gestion de Rendez-Vous Hospitaliere</h3>
                </div>
                <div class="col-sm-3 barre" >
                    <div>
                    Gestion des Medecins
                    </div>

                    <div>
                    Gestion des Secretaires
                    </div>
                </div>
                <div class="">
                <button> <a href="Ajouter_Medecin.php">Enregistrer Medecin </a></button>
                <button> <a href="Ajouter_Secretaire.php">Enregistrer Secretaire </a></button>
                <button> <a href="supprimer_Medecin.php">Supprimer Medecin </a></button>
                <button> <a href="supprimer_Secretaire.php">Supprimer Secretaire </a></button>
                <button> <a href="Modifier_Medecin.php">Modifier Medecin </a></button>
                <button> <a href="Modifier_Secretaire.php">Modifier Secretaire </a></button>
                
                </div>
        </div>
    </div>
    </body>
</html>
  <!--===============================================================================================-->
  <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
  
</body>
</html>
