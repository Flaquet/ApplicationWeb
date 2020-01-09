<?php 

    function Menu(){
       if (!isset($_SESSION['id'])){
            ?>
            <div class='wifeo_conteneur_menu'>
                <div class='wifeo_pagemenu'><a href="index.php">Page d'accueil</a></div>
                <div class='wifeo_rubrique'><a href='#mw999'>Inscrip/Connec</a>
                    <div class='wifeo_sousmenu'>
                        <div class='wifeo_pagesousmenu'><a href=inscription.php>Inscription</a></div>
                        <div class='wifeo_pagesousmenu'><a href="connexion.php">Connexion</a></div>
                    </div>
                </div>
                <div class='wifeo_pagemenu'><a href="Skinavote.php">Voter pour des Skins</a></div>
            </div>
            <?php
        }else if(isset($_SESSION['id'])){
            ?>
            <div class='wifeo_conteneur_menu'>
                <div class='wifeo_pagemenu'><a href="index.php">Page d'accueil</a></div>
                <div class='wifeo_pagemenu'><a href="Skinavote.php">Vote pour un Skin</a></div>  
                <div class='wifeo_rubrique'><a href='#mw999'>Deco/Supprimer</a>
                    <div class='wifeo_sousmenu'>
                        <div class='wifeo_pagesousmenu'><a href="deconnexion.php">deconnexion</a></div> 
                        <div class='wifeo_pagesousmenu'><a href="deletcomp.php">Supprimer</a></div>
                    </div>
                </div> 

            </div>
        <?php
        }  

    }

?>
