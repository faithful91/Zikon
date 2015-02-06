<?php

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
$req = $bdd->prepare('SELECT titres.id,titres.nom,albums.cover,artistes.nom as anom FROM titres_albums,albums,titres,artistes_titres,artistes,genres WHERE
							 titres_albums.titre = titres.id and titres_albums.album = albums.id and artistes_titres.artiste = artistes.id and
           					 artistes_titres.titre = titres.id and titres.genre = genres.id and genres.id = ?
							 order by titres.nom');
$req->execute(array($_POST['genre']));


  $compteur = 0;
//echo "<div id='liste1' class='row'>";
//	echo "<div class='col-lg-12'>";
//		echo "<div class='row'>";
session_start();
  while ($donnees = $req->fetch()){

		  	echo "<div class='col-xs-6 col-md-3' style='color:#000000'>"	;					    
				echo "<div>";
					echo "".$donnees['nom']."<br/>";
					echo "<small ><i>by ".$donnees['anom']."</i></small>" ;      
					echo "<img src='".$donnees['cover']."' class='thumbnail img-responsive' width='170' height='170'>";		
					if( isset($_SESSION['playlist']) && in_array($donnees['id'], $_SESSION['playlist']) ){
						echo "<button id ='btn_".$donnees['id']."' class='btn btn-danger' style='position:absolute;bottom:22px;' onclick='retirerDePlaylist(".$donnees['id'].")'>";
							echo "<span id ='span_".$donnees['id']."'  class='glyphicon glyphicon-minus' aria-hidden='true'></span>";
					}else{
						echo "<button id ='btn_".$donnees['id']."' class='btn btn-success' style='position:absolute;bottom:22px;' onclick='ajouterDansPlaylist(".$donnees['id'].")'>";
							echo "<span id ='span_".$donnees['id']."' class='glyphicon glyphicon-plus' aria-hidden='true'></span>";
					}
					echo "</button>";
				echo "</div>";
			echo "</div>";			          
  }
//		echo "</div>";
//	echo "</div>";
//echo "</div>";

?>