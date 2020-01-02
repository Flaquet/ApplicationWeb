<link rel="stylesheet" href="../CSS/stylemenu.css">
<?php 

    function Menu(){
       if (!isset($_SESSION['id'])){
            ?>
            <div class='wifeo_conteneur_menu'>
                <div class='wifeo_rubrique'><a href='#mw999'>Inscrip/Connec</a>
                    <div class='wifeo_sousmenu'>
                        <div class='wifeo_pagesousmenu'><a href=inscription.php>Inscription</a></div>
                        <div class='wifeo_pagesousmenu'><a href="connexion.php">Connexion</a></div>
                    </div>
                </div>
            <?php
        }else  if(isset($_SESSION['id'])){
            ?>
                <div class='wifeo_pagemenu'><a href="voteskin.php">Vote pour un Skin</a></div>
                <div class='wifeo_pagemenu'><a href="deconnexion.php">deconnexion</a></div>
            </div>
        <?php
        }  

    }

?>
