<?php
    session_start();
    include('bd/connexionDB.php'); // Fichier PHP contenant la connexion à votre BDD


    // Si la variable "$_Post" contient des informations alors on les traitres
    if(!empty($_POST)){
        extract($_POST);
        $valid = true;

        // On se place sur le bon formulaire grâce au "name" de la balise "input"
        if (isset($_POST['enregistrer'])){
            $id_Secretaire = trim($id_Secretaire); // On récupère le matricule
            $prenom = htmlentities(trim($prenom)); // on récupère le prénom
            $nom  = htmlentities(trim($nom)); // On récupère le nom
            $mail = htmlentities(strtolower(trim($mail))); // On récupère le mail
            $tel = (trim($tel)); // on récupère le telephone
            $tel = (trim($tel)); // on récupère le prénom
            $pseudo = (trim($pseudo)); // on récupère le pseudo
            $mdp = trim($mdp); // On récupère le mot de passe 
            $service = (trim($service)); // on récupère le service
            

            //  Vérification du matricule
            if(empty($id_Medecin)){
                $valid = false;
                $er_id_Medecin = ("Le matricule ne peut pas être vide");
            } 
          
            //  Vérification du nom
            if(empty($nom)){
                $valid = false;
                $er_nom = ("Le nom d'utilisateur ne peut pas être vide");
            }       

            //  Vérification du prénom
            if(empty($prenom)){
                $valid = false;
                $er_prenom = ("Le prenom d'utilisateur ne peut pas être vide");
            }       

            // Vérification du mail
            if(empty($mail)){
                $valid = false;
                $er_mail = "Le mail ne peut pas être vide";

                // On vérifit que le mail est dans le bon format
            }elseif(!preg_match("/^[a-z0-9\-_.]+@[a-z]+\.[a-z]{2,3}$/i", $mail)){
                $valid = false;
                $er_mail = "Le mail n'est pas valide";

            }else{
                // On vérifit que le mail est disponible
                $req_mail = $DB->query("SELECT mail FROM utilisateur WHERE mail = ?",
                    array($mail));

                $req_mail = $req_mail->fetch();

                if ($req_mail['mail'] <> ""){
                    $valid = false;
                    $er_mail = "Ce mail existe déjà";
                }
            }

            //  Vérification du Telephone
            if(empty($tel)){
                $valid = false;
                $er_tel = ("Le numero du telephone ne peut pas être vide");
            } 

            //  Vérification du Pseudo
            if(empty($pseudo)){
                $valid = false;
                $er_pseudo = ("Le pseudo ne peut pas être vide");
            } 

            // Vérification du mot de passe
            if(empty($mdp)) {
                $valid = false;
                $er_mdp = "Le mot de passe ne peut pas être vide";

            }

            //  Vérification du Service
            if(empty($service)){
                $valid = false;
                $er_service = ("Le service ne peut pas être vide");
            } 
 

            // Si toutes les conditions sont remplies alors on fait le traitement
            if($valid){

                // On insert nos données dans la table utilisateur
                $DB->insert("INSERT INTO Medecin (idMedecin, Prenom_Med, nom_Med, Email_Med, Tel_Med , Pseudo, MDP , Service_idService, Specialite_idSpecialite) VALUES 
                    (?, ?, ?, ?, ?, ?, ?, ?)", 
                    array($idMedecin, $Prenom_Med, $nom_Med, $Email_Med, $Tel_Med , $Pseudo, $MDP , $Service_idService, $Specialite_idSpecialite));

                header('Location: index.php');
                exit;
            }
        }
    }
?>

    <!DOCTYPE html>
    <html>
    <head>
        <title>Admin | Medecin</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="employe.css">
    </head>
    
    <style>
      fieldset{ 
                border:solid 1px #EE6600; 
                border-radius:10px; 
                padding:20px; 
             } 
             legend{ 
                font:bold 16pt arial; 
                  
                         color:#EE6600;
    
                      }
       body{ 
                padding:10px; 
       
    }
    
    label{
       margin-bottom:4px; 
                font:10pt arial; 
                color:#AAAAAA; 
    }
    .saisi{
        width: 100%;
        height: 35px;
        border-radius: 5px;
        background-color: #fff;
        border: 1px solid silver;
    }
    
                
       
    }
    .enregister{
                border:none; 
                background-color:#EE6600; 
                color:#FFFFFF; 
                width:200px; 
                height:35px;
                cursor:pointer; 
    }
    
    
    
    
    </style>
    <body>
        <div class="page"> 
           <fieldset>
          <legend>Nouveau Secretaire</legend>
            <form method="POST">
                <div> 
                    <label for="id_Medecin">Matricule :</label>
                    <?php
                        // S'il y a une erreur sur le matricule alors on affiche
                        if (isset($er_id_Medecin)){
                        ?>
                             <div><?= $er_id_Medecin ?></div>
                        <?php   
                        }
                    ?>
                    <input type="text" name="id_Medecin" class="saisi" id="matricule" value="<?php if(isset($nom)){ echo $nom; }?>" required>
                </div>
                <div> 
                    <label for="prenom">Prenom :</label>
                    <?php
                        // S'il y a une erreur sur le prenom alors on affiche
                        if (isset($er_prenom)){
                        ?>
                        <div><?= $er_prenom ?></div>
                        <?php   
                        }
                    ?>
                    <input type="text" name="prenom" class="saisi" id="prenom" value="<?php if(isset($prenom)){ echo $prenom; }?>" required>
                </div>
                <div> 
                    <label for="nom">Nom :</label>
                    <?php
                        // S'il y a une erreur sur le nom alors on affiche
                        if (isset($er_nom)){
                        ?>
                        <div><?= $er_nom ?></div>
                        <?php   
                        }
                    ?>
                    <input type="text" name="nom" class="saisi" id="nom" value="<?php if(isset($nom)){ echo $nom; }?>" required>
                </div>
               
                <div> 
                    <label for="mail">Email</label>
                    <?php
                        // S'il y a une erreur sur le matricule alors on affiche
                        if (isset($er_mail)){
                        ?>
                        <div><?= $er_mail ?></div>
                        <?
                        }
                    ?>
                    <input type="text" name="mail" class="saisi" id="mail" value="<?php if(isset($mail)){ echo $mail; }?>" required>
                </div>

                <div> 
                    <label for="tel">Tel :</label>
                    <?php
                        // S'il y a une erreur sur le matricule alors on affiche
                        if (isset($er_tel)){
                        ?>
                        <div><?= $er_tel ?></div>
                        <?php   
                        }
                    ?>
                    <input type="text" name="tel" class="saisi" id="tel" value="<?php if(isset($tel)){ echo $tel; }?>" required>
                </div>

                <div> 
                    <label for="Pseudo"> Pseudo :</label>
                    <?php
                        // S'il y a une erreur sur le matricule alors on affiche
                        if (isset($er_id_Medecin)){
                        ?>
                        <div><?= $er_id_Medecin ?></div>
                        <?php   
                        }
                    ?>
                    <input type="text" name="pseudo" class="saisi" id="pseudo" value="<?php if(isset($nom)){ echo $nom; }?>" required>
                </div>

                <div>
                    <label for="MDP"> Mots de passe :</label>
                    <?php
                        // S'il y a une erreur sur le matricule alors on affiche
                        if (isset($er_id_Medecin)){
                        ?>
                        <div><?= $er_id_Medecin ?></div>
                        <?php   
                        }
                    ?>
                    <input type="text" name="mdp" class="saisi" id="mdp" value="<?php if(isset($mdp)){ echo $mdp; }?>" required>
                </div>

                <div> 
                    <label for="service"> service :</label>
                    <?php
                        // S'il y a une erreur sur le service alors on affiche
                        if (isset($er_service)){
                        ?>
                        <div><?= $er_service ?></div>
                        <?php   
                        }
                    ?>
                    <input type="text" name="service" class="saisi" id="service" value="<?php if(isset($service)){ echo $service; }?>" required>
                </div> 
                 
                
                <input class="enregister" type="submit" name="enregistrer" value="Enregistrer">
                
            </form>
          </fieldset>
        </div>
    
    </body>
    </html>
</body>
</html>