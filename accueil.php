
<!DOCTYPE html>
<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="css/local.css" />

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/shieldui-all.min.css" />
    <link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/light-bootstrap/all.min.css" />
    <link id="gridcss" rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/dark-bootstrap/all.min.css" />

    <script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>
    <script type="text/javascript" src="http://www.prepbootstrap.com/Content/js/gridData.js"></script>

    
</head>


<body  style=background-color:#FFFFFF>

    <div id="wrapper">

          <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul id="active" class="nav navbar-nav side-nav">
                    <img src="img/logo4.png" alt="ZikOn" style="width:225px;height:100px">
                    
                    <li class="selected"><a href="accueil.php"><i class="fa fa-bullseye"></i> Accueil</a></li>
                    <li><a href="./genres.php"><i class="fa fa-tasks"></i> Genres</a></li>
                    <li><a href="./news.php"><i class="fa fa-globe"></i> News</a></li>                  
                    <li><a href="./artistes.php"><i class="fa fa-list-ul"></i> Artistes</a></li>
                    <li><a href="./historique.php"><i class="fa fa-list-ol"></i>Historique</a></li>
                    <li>
                      <a id ="playlist_link" href="./playlist.php">
                      <i class="fa fa-list"></i> Playlist 
                        <span class="label label-warning">
                          <?php  
                            session_start ();
                            if(isset($_SESSION['playlist'])){
                              echo count($_SESSION['playlist']);
                            }else{
                              echo "0";
                            }
                          ?>
  
                        </span>
                      </a>
                        
                    </li>
                    <li>
                      <div id="msg" class="navbar-form navbar-right"></div>

                    </li>
                    
                    <!-- <img src="img/logo4.png" alt="ZikOn" style="width:225px;height:100px"> -->
                    
                </ul>

                 <?php 
                
                if (isset($_SESSION['login']) && isset($_SESSION['pwd'])) {
                ?>
                  <form class="navbar-form navbar-right" role="search" action="deconnexion.php" method="post">
                          <button type="submit" class="btn btn-default">
                            <span class="glyphicon glyphicon-log-out" aria-hidden="true">
                              Déconnexion
                            </span>
                          </button>
                  </form>
                  <div class="navbar-form navbar-right">
                    <h5>
                      Bonjour <?php echo $_SESSION['nom']; ?>
                    </h5>
                    
                  </div>
                  
                <?php
                  }else{
                ?>
                      <form class="navbar-form navbar-right navbar-input-group" role="search" action="login.php" method="post" onsubmit="return validate()" >             
                          <div class="form-group">
                              <input class="form-control" type="text"  name="login" placeholder="Username" id="email">
                          </div>
                          <div class="form-group">
                              <input type="password" class="form-control" name="pwd" placeholder="Password"/>
                          </div>
                          <input type="submit" class="btn btn-default" value="se connecter"></input>
                      </form>
                      
                <?php
                  }
                ?>
                <form class="navbar-form navbar-right navbar-input-group" role="search" action="search.php" method="post" >
                         <div class="form-group">
                            <input type="text" class="form-control" name="text" style="color:#000000" placeholder="Search for...">
                          </div>
                          <input type="submit" class="btn btn-default" value="Go!"></input>

                      </form>
            </div>
        </nav>

    
            <div class="row">

                <div class="col-lg-9 col-xs-offset-1">
					  <h2 id='result'></h2>
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
						$reponse = $bdd->query('SELECT titres.id,titres.nom,albums.cover,artistes.nom as anom FROM titres_albums,albums,titres,artistes_titres,artistes WHERE
							 titres_albums.titre = titres.id and titres_albums.album = albums.id and artistes_titres.artiste = artistes.id and
               artistes_titres.titre = titres.id 
							 order by titres.nom');
						?>

						<div class="row">

						<?php
						// On affiche chaque entrée une à une
						while ($donnees = $reponse->fetch())
						{
						?>
						  <div class="col-xs-6 col-md-3" style="color:#000000;" >
						    
						          <div  >
						          	 <?php echo $donnees['nom']; ?> <br/>
                        <small ><i>by <?php echo $donnees['anom']; ?></i></small>
						             
                         <img src="<?php echo $donnees['cover']; ?>" class="thumbnail img-responsive" width="170" height="170">		
						          	<?php
                          if( isset($_SESSION['playlist']) && in_array($donnees['id'], $_SESSION['playlist']) ){
                          ?>
                            <button id ="btn_<?php echo $donnees['id']; ?>" class="btn btn-danger" style="position:absolute;bottom:22px;" onclick="retirerDePlaylist(<?php echo $donnees['id']; ?>)"> 
                              <span id ="span_<?php echo $donnees['id']; ?>" class="glyphicon glyphicon-minus" aria-hidden="true"></span>
                            <?php
                          }else{
                            ?>
                            <button id ="btn_<?php echo $donnees['id']; ?>" class="btn btn-success" style="position:absolute;bottom:22px;" onclick="ajouterDansPlaylist(<?php echo $donnees['id']; ?>)">
                              <span id ="span_<?php echo $donnees['id']; ?>" class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        <?php
                          }
                        ?>
                        	
					          		</button>
						          </div>
					          
						  </div>

						   
						<?php
						}

						$reponse->closeCursor(); // Termine le traitement de la requête

						?>
					</div>
 

                </div>
            </div>




    </div>
    <!-- /#wrapper -->
    
    
  <script type="text/javascript">
  function validateEmail(email) {   
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

function validate(){
  $("#result").text("");
  var email = $("#email").val();
  if (validateEmail(email)) {
    return true;
  } else {
    $("#msg").html("<div class='alert alert-danger' role='alert'>"
        +"<span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>"
        +"<span class='sr-only'>Error:</span>"
        +"&nbsp;Votre adresse n'est pas valide !"
        +"</div>");
    return false;
  }
  
}

	function ajouterDansPlaylist(id){
		// Détection du support
    <?php 
      if(isset($_SESSION['playlist']) ){
        ?>
        $.ajax({
          type:       "GET",
          cache:      false,
          url:        "./gestionPlaylist.php",
          data:       "id="+id+"&action=ADD",
          dataType : 'html', // On désire recevoir du HTML
          success : function(code_html, statut){ // code_html contient le HTML renvoyé
             $("#playlist_link").html(code_html);
             //alert(code_html);
         }
      });
        $("#btn_"+id).attr("class","btn btn-danger");
        $("#btn_"+id).attr("onclick","retirerDePlaylist("+id+")"); 
        $("#span_"+id).attr("class","glyphicon glyphicon-minus");
      <?php
      }else{
        ?>
      $("#msg").html("<div class='alert alert-danger' role='alert'>"
        +"<span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>"
        +"<span class='sr-only'>Error:</span>"
        +"&nbsp;Vous devez vous connecter !"
        +"</div>");

      <?php
      }
    ?>
		
  }

  function retirerDePlaylist(id){
    <?php 
      if(isset($_SESSION['playlist']) ){
        ?>
        $.ajax({
            type:       "GET",
            cache:      false,
            url:        "./gestionPlaylist.php",
            data:       "id="+id+"&action=REMOVE_BY_ID",
            dataType : 'html', // On désire recevoir du HTML
            success : function(code_html, statut){ // code_html contient le HTML renvoyé
               $("#playlist_link").html(code_html);
               //alert(code_html);
           }
        }); 
        $("#btn_"+id).attr("class","btn btn-success");
        $("#btn_"+id).attr("onclick","ajouterDansPlaylist("+id+")"); 
        $("#span_"+id).attr("class","glyphicon glyphicon-plus");

     <?php
      }else{
        ?>
      $("#msg").html("<div class='alert alert-danger' role='alert'>"
        +"<span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>"
        +"<span class='sr-only'>Error:</span>"
        +"&nbsp;Vous devez vous connecter !"
        +"</div>");
      <?php
      }
    ?>
  }

	function ajouteElement() 
	{  
		var email = $("#email").val();

		var mon_div = null;
		var nouveauDiv = null;
		  // crée un nouvel élément div
		  // et lui donne un peu de contenu
		  nouveauDiv = document.createElement("div");
		  nouveauDiv.innerHTML = email;
		    nouveauDiv.style.color="black";
		  // ajoute l'élément qui vient d'être créé et son contenu au DOM
		  mon_div = document.getElementById("org_div1");
		  if (validateEmail(email))
		    {mon_div.parentNode.insertBefore(nouveauDiv,mon_div);}
	}
    </script>





    </body>
    
    
</html>
