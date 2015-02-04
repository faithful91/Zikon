<?php
	session_start ();

        //$requete = 'SELECT prix FROM pays WHERE id='.$_POST['pays'];   
        //$fraisexpedition = sqlSelect($requete);
	if ($_GET['action']=="ADD") {
		array_push($_SESSION['playlist'], $_GET['id']) ;
	} else {
		$id = $_GET['id'];
		unset($_SESSION['playlist'][$id]);
		$_SESSION['playlist'] = array_values($_SESSION['playlist']);
		var_dump($_SESSION['playlist'] );
	}
	
        
?>