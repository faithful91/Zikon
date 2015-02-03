<?php
function ajouter(){
        //$requete = 'SELECT prix FROM pays WHERE id='.$_POST['pays'];   
        //$fraisexpedition = sqlSelect($requete);
         array_push($_SESSION['playlist'], $_POST['id']) ;
         $_SESSION['playlist'] = array("1","2","3" );
    }
?>