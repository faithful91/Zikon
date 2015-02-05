<?php
	session_start ();

        //$requete = 'SELECT prix FROM pays WHERE id='.$_POST['pays'];   
        //$fraisexpedition = sqlSelect($requete);
	if ($_GET['action']=="ADD") {
		if ( ! in_array($_GET['id'], $_SESSION['playlist'])){ 
			array_push($_SESSION['playlist'], $_GET['id']) ;
		}
	} else if($_GET['action']=="REMOVE") {
		$id = $_GET['id'];
		
			unset($_SESSION['playlist'][$id]);
			$_SESSION['playlist'] = array_values($_SESSION['playlist']);
		
	}else{
		
		if ( in_array($_GET['id'], $_SESSION['playlist'])){
			$id = array_search($_GET['id'], $_SESSION['playlist']);
			unset($_SESSION['playlist'][$id]);
			$_SESSION['playlist'] = array_values($_SESSION['playlist']);
		
		}

	}	
	
?>