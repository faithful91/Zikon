<?php
	session_start ();

        //$requete = 'SELECT prix FROM pays WHERE id='.$_POST['pays'];   
        //$fraisexpedition = sqlSelect($requete);
	if ($_GET['action']=="ADD") {
		if ( ! in_array($_GET['id'], $_SESSION['playlist'])){ 
			array_push($_SESSION['playlist'], $_GET['id']) ;
			//insert into historiques values (1,'hazem@gmail.com') on duplicate KEY UPDATE titre=1
			try
			{
			    // On se connecte à MySQL
			    $bdd = new PDO('mysql:host=localhost;dbname=zikon;charset=utf8', 'root', 'root');
			}
			catch(Exception $e)
			{
			    // En cas d'erreur, on affiche un message et on arrête tout
			        die('Erreur : '.$e->getMessage());
			}

			// Si tout va bien, on peut continuer

			// On récupère tout le contenu de la table jeux_video
			$req = $bdd->prepare('INSERT INTO historiques values (?,?) ON DUPLICATE KEY UPDATE titre=?');
			$req->execute(array($_GET['id'],$_SESSION['login'],$_GET['id']));
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