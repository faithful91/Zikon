
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
    <title>Playlist</title>

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

    <link href="jplayer/skin/blue.monday/css/jplayer.blue.monday.min.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="jplayer/jquery.jplayer.min.js"></script>
    <script type="text/javascript" src="jplayer/add-on/jplayer.playlist.js"></script>
    <?php session_start();?>
    <script type="text/javascript">
    <?php

      try
      {
          // On se connecte à MySQL
          $bdd = new PDO('mysql:host=localhost;dbname=zikon;charset=utf8', 'root', 'root');
      
      // Si tout va bien, on peut continuer

      // On récupère tout le contenu de la table jeux_video

      $query = "SELECT titres_albums.id, albums.nom as anom, titres.nom as tnom , path , cover, genres.nom as gnom , artistes.nom as artnom 
      FROM artistes,artistes_albums,titres_albums,albums,titres,genres 
      WHERE titres_albums.titre = titres.id and titres_albums.album = albums.id 
      and genres.id = titres.genre and artistes.id = artistes_albums.artiste 
      and albums.id = artistes_albums.album 
      and titres_albums.id IN(".implode(',',$_SESSION['playlist']).") 
      ORDER BY FIELD(titres_albums.id, ".implode(',',$_SESSION['playlist'])." )";
      $reponse = $bdd->query($query );
      $rows = [];
      // On affiche chaque entrée une à une
      $compteur = 0;
      if( !empty($reponse) ){
      while ($donnees = $reponse->fetch())
      {
        $compteur++;
        array_push( $rows ,$donnees); 
      }
        $reponse->closeCursor();
        }
      }
      catch(Exception $e)
      {
          // En cas d'erreur, on affiche un message et on arrête tout
           //   die('Erreur : '.$e->getMessage());
      }catch (PDOException $e) {
 
    //pdo_error("FETCH ERROR: ".$e->getMessage(), "Query:".$Query);
 
}

    ?>
      $(document).ready(function(){
          var myPlaylist = new jPlayerPlaylist({
          jPlayer: "#jquery_jplayer_N",
          cssSelectorAncestor: "#jp_container_N"
        },
    <?php
        if($compteur > 0){
      ?>
        [
      <?php 
          $count = 0;
          foreach($rows as $row){ 
          if($count != 0){
       ?>
         ,
         <?php 
          }
         ?>
        {
            title:"<?php echo $row['tnom']; ?>",
            artist:"<?php echo $row['artnom']; ?>",
            mp3:"<?php echo $row['path']; ?>",
            poster: "<?php echo $row['cover']; ?>"
        }
      <?php 
        $count++;
      }
      ?>
      ]
      <?php 
      }else{

        ?>
        []
        <?php
      }
      ?>
    , {
    playlistOptions: {
      enableRemoveControls: true
    },
    swfPath: "./jplayer",
    supplied: "webmv, ogv, m4v, oga, mp3",
    useStateClassSkin: true,
    autoBlur: false,
    smoothPlayBar: true,
    keyEnabled: true,
    audioFullScreen: true
  });

});
function retirerDePlaylist(id)
{
    // Détection du support
    $.ajax({
        type:       "GET",
        cache:      false,
        url:        "./gestionPlaylist.php",
        data:       "id="+id+"&action=REMOVE"
    }); 
}
// Add an event listener
document.addEventListener("my-remove", function(e) {
  console.log(e.detail); // Prints "Example of an event"
  retirerDePlaylist(e.detail);
});




</script>

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
                    
                    <li class="selected"><a href="index.php"><i class="fa fa-bullseye"></i> Accueil</a></li>
                    <li><a href="#"><i class="fa fa-tasks"></i> Genres</a></li>
                    <li><a href="#"><i class="fa fa-globe"></i> News</a></li>                  
                    <li><a href="#"><i class="fa fa-list-ul"></i> Artistes</a></li>
                    <li><a href="#"><i class="fa fa-list-ol"></i> Charts</a></li>
                    <li><a href="#"><i class="fa fa-table"></i> Agenda</a></li>
                    <li><a href="#"><i class="fa fa-list"></i> Playlist</a></li>
                    
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
                          <button type="submit" class="btn btn-default" id="validate" onClick="ajouteElement()">Sign In</button>
                      </form>

                <?php
                  }
                ?>
                 
            </div>
        </nav>
<div >
<div style="margin-left: auto;
    margin-right: auto;" id="jp_container_N" class="jp-video jp-video-240p" role="application" aria-label="media player">
  <div class="jp-type-playlist">
    <div id="jquery_jplayer_N" class="jp-jplayer"></div>
    <div class="jp-gui">
      <div class="jp-video-play">
        <button class="jp-video-play-icon" role="button" tabindex="0">play</button>
      </div>
      <div class="jp-interface">
        <div class="jp-progress">
          <div class="jp-seek-bar">
            <div class="jp-play-bar"></div>
          </div>
        </div>
        <div class="jp-current-time" role="timer" aria-label="time">&nbsp;</div>
        <div class="jp-duration" role="timer" aria-label="duration">&nbsp;</div>
        <div class="jp-controls-holder">
          <div class="jp-controls">
            <button class="jp-previous" role="button" tabindex="0">previous</button>
            <button class="jp-play" role="button" tabindex="0">play</button>
            <button class="jp-next" role="button" tabindex="0">next</button>
            <button class="jp-stop" role="button" tabindex="0">stop</button>
          </div>
          <div class="jp-volume-controls">
            <button class="jp-mute" role="button" tabindex="0">mute</button>
            <button class="jp-volume-max" role="button" tabindex="0">max volume</button>
            <div class="jp-volume-bar">
              <div class="jp-volume-bar-value"></div>
            </div>
          </div>
          <div class="jp-toggles">
            <button class="jp-repeat" role="button" tabindex="0">repeat</button>
            <button class="jp-shuffle" role="button" tabindex="0">shuffle</button>
            <button class="jp-full-screen" role="button" tabindex="0">full screen</button>
          </div>
        </div>
        <div class="jp-details">
          <div class="jp-title" aria-label="title">&nbsp;</div>
        </div>
      </div>
    </div>
    <div class="jp-playlist">
      <ul>
        <!-- The method Playlist.displayPlaylist() uses this unordered list -->
        <li>&nbsp;</li>
      </ul>
    </div>
    </div>     
  </div>
</div>
  <h2 id='result'></h2>

   

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
    $("#result").text(email + " is valid :)");
    $("#result").css("color", "green");
    return true;
  } else {
    $("#result").text(email + " is not valid :(");
    $("#result").css("color", "red");
  }
  return false;
}
//$("form").bind("submit", validate);
</script>
    
    
  

<script type="text/javascript">
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

  function retirerDePlaylist(id){
    // Détection du support
    $.ajax({
        type:       "GET",
        cache:      false,
        url:        "./gestionPlaylist.php",
        data:       "id="+id+"&action=REMOVE"
    }); 
  }

  // Click handlers for jPlayerPlaylist method demo

  // Audio mix playlist



</script>




    </body>
    
    
</html>
