<?php
	session_start ();

        //$requete = 'SELECT prix FROM pays WHERE id='.$_POST['pays'];   
        //$fraisexpedition = sqlSelect($requete);
	if ($_GET['action']=="ADD") {
		if ( ! in_array($_GET['id'], $_SESSION['playlist'])){ 
			array_push($_SESSION['playlist'], $_GET['id']) ;

			echo "<i class='fa fa-list'></i> Playlist ";
            echo "<span class='label label-warning'>";                           
            echo count($_SESSION['playlist']);
           	echo "</span>";
		}
	} else if($_GET['action']=="REMOVE") {
		$id = $_GET['id'];
		
			unset($_SESSION['playlist'][$id]);
			$_SESSION['playlist'] = array_values($_SESSION['playlist']);
			echo "<i class='fa fa-list'></i> Playlist ";
            echo "<span class='label label-warning'>";                           
            echo count($_SESSION['playlist']);
           	echo "</span>";
	}else{
		
		if ( in_array($_GET['id'], $_SESSION['playlist'])){
			$id = array_search($_GET['id'], $_SESSION['playlist']);
			unset($_SESSION['playlist'][$id]);
			$_SESSION['playlist'] = array_values($_SESSION['playlist']);
			echo "<i class='fa fa-list'></i> Playlist ";
            echo "<span class='label label-warning'>" ;                          
            echo count($_SESSION['playlist']);
           	echo "</span>";
		}

	}	
	
?>