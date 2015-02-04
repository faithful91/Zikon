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
$req = $bdd->prepare('SELECT titres.id,titres.nom,albums.cover  FROM titres_albums,albums,titres,genres WHERE
							 titres_albums.titre = titres.id and titres_albums.album = albums.id 
							 and genres.id = titres.genre and genres.id = ?
							 order by titres.nom');
$req->execute(array($_POST['genre']));


  $compteur = 0;
echo "<div id='liste1' class='row'>";
//	echo "<div class='col-lg-12'>";
//		echo "<div class='row'>";

  while ($donnees = $req->fetch()){

		  	echo "<div class='col-xs-6 col-md-3' >"	;					    
				echo "<div>";
					echo "<strong>".$donnees['nom']."</strong>";
					echo "<img src='".$donnees['cover']."' class='thumbnail img-responsive' width='170' height='170'>";		
					echo "<button class='btn' style='position:absolute;bottom:22px;' onclick='ajouterDansPlaylist(".$donnees['id'].")'>";
						echo "<span class='glyphicon glyphicon-plus' aria-hidden='true'></span>";
					echo "</button>";
				echo "</div>";
			echo "</div>";			          
  }
//		echo "</div>";
//	echo "</div>";
echo "</div>";

?>