<?php
	session_start ();

        //$requete = 'SELECT prix FROM pays WHERE id='.$_POST['pays'];   
        //$fraisexpedition = sqlSelect($requete);
         array_push($_SESSION['playlist'], $_GET['id']) ;
        print_r($_SESSION['playlist']);
?>