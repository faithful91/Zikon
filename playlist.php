
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
    <script type="text/javascript" src="jplayer/add-on/jplayer.playlist.min.js"></script>
    <?php session_start();?>
    <script type="text/javascript">
//<![CDATA[
$(document).ready(function(){

  var myPlaylist = new jPlayerPlaylist({
    jPlayer: "#jquery_jplayer_N",
    cssSelectorAncestor: "#jp_container_N"
  }, [
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
      $ids = join(',',$_SESSION['playlist']);  
      // On récupère tout le contenu de la table jeux_video

      $query = "SELECT titres_albums.id, albums.nom as anom, titres.nom as tnom , path , cover, genres.nom as gnom , artistes.nom as artnom FROM artistes,artistes_albums,titres_albums,albums,titres,genres WHERE titres_albums.titre = titres.id and titres_albums.album = albums.id and genres.id = titres.genre and artistes.id = artistes_albums.artiste and albums.id = artistes_albums.album and titres_albums.id IN(".implode(',',$_SESSION['playlist']).")";
      $reponse = $bdd->query($query );

      // On affiche chaque entrée une à une
      $compteur = 0;
      while ($donnees = $reponse->fetch())
      {
        if($compteur != 0){
      ?>
        ,
      <?php  
        } ?>
        {
            title:"<?php echo $donnees['tnom']; ?>",
            artist:"<?php echo $donnees['artnom']; ?>",
            mp3:"http://www.jplayer.org/audio/mp3/TSP-05-Your_face.mp3",
            poster: "<?php echo $donnees['cover']; ?>"
        }
      <?php 
        $compteur++;
      }
      $reponse->closeCursor(); // Termine le traitement de la requête

      ?>
    ], {
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

  // Click handlers for jPlayerPlaylist method demo


 
  // Audio mix playlist

  $("#playlist-setPlaylist-audio-mix").click(function() {
    myPlaylist.setPlaylist([
      {
        title:"Cro Magnon Man",
        artist:"The Stark Palace",
        mp3:"http://www.jplayer.org/audio/mp3/TSP-01-Cro_magnon_man.mp3",
        oga:"http://www.jplayer.org/audio/ogg/TSP-01-Cro_magnon_man.ogg",
        poster: "http://www.jplayer.org/audio/poster/The_Stark_Palace_640x360.png"
      },
      {
        title:"Your Face",
        artist:"The Stark Palace",
        mp3:"http://www.jplayer.org/audio/mp3/TSP-05-Your_face.mp3",
        oga:"http://www.jplayer.org/audio/ogg/TSP-05-Your_face.ogg",
        poster: "http://www.jplayer.org/audio/poster/The_Stark_Palace_640x360.png"
      },
      {
        title:"Hidden",
        artist:"Miaow",
        free: true,
        mp3:"http://www.jplayer.org/audio/mp3/Miaow-02-Hidden.mp3",
        oga:"http://www.jplayer.org/audio/ogg/Miaow-02-Hidden.ogg",
        poster: "http://www.jplayer.org/audio/poster/Miaow_640x360.png"
      },
      {
        title:"Cyber Sonnet",
        artist:"The Stark Palace",
        mp3:"http://www.jplayer.org/audio/mp3/TSP-07-Cybersonnet.mp3",
        oga:"http://www.jplayer.org/audio/ogg/TSP-07-Cybersonnet.ogg",
        poster: "http://www.jplayer.org/audio/poster/The_Stark_Palace_640x360.png"
      },
      {
        title:"Tempered Song",
        artist:"Miaow",
        mp3:"http://www.jplayer.org/audio/mp3/Miaow-01-Tempered-song.mp3",
        oga:"http://www.jplayer.org/audio/ogg/Miaow-01-Tempered-song.ogg",
        poster: "http://www.jplayer.org/audio/poster/Miaow_640x360.png"
      },
      {
        title:"Lentement",
        artist:"Miaow",
        mp3:"http://www.jplayer.org/audio/mp3/Miaow-03-Lentement.mp3",
        oga:"http://www.jplayer.org/audio/ogg/Miaow-03-Lentement.ogg",
        poster: "http://www.jplayer.org/audio/poster/Miaow_640x360.png"
      }
    ]);
  });


  // The remove commands

  $("#playlist-remove").click(function() {
    myPlaylist.remove();
  });

  $("#playlist-remove--2").click(function() {
    myPlaylist.remove(-2);
  });
  $("#playlist-remove--1").click(function() {
    myPlaylist.remove(-1);
  });
  $("#playlist-remove-0").click(function() {
    myPlaylist.remove(0);
  });
  $("#playlist-remove-1").click(function() {
    myPlaylist.remove(1);
  });
  $("#playlist-remove-2").click(function() {
    myPlaylist.remove(2);
  });

  // The shuffle commands

  $("#playlist-shuffle").click(function() {
    myPlaylist.shuffle();
  });

  $("#playlist-shuffle-false").click(function() {
    myPlaylist.shuffle(false);
  });
  $("#playlist-shuffle-true").click(function() {
    myPlaylist.shuffle(true);
  });

  // The select commands

  $("#playlist-select--2").click(function() {
    myPlaylist.select(-2);
  });
  $("#playlist-select--1").click(function() {
    myPlaylist.select(-1);
  });
  $("#playlist-select-0").click(function() {
    myPlaylist.select(0);
  });
  $("#playlist-select-1").click(function() {
    myPlaylist.select(1);
  });
  $("#playlist-select-2").click(function() {
    myPlaylist.select(2);
  });

  // The next/previous commands

  $("#playlist-next").click(function() {
    myPlaylist.next();
  });
  $("#playlist-previous").click(function() {
    myPlaylist.previous();
  });

  // The play commands

  $("#playlist-play").click(function() {
    myPlaylist.play();
  });

  $("#playlist-play--2").click(function() {
    myPlaylist.play(-2);
  });
  $("#playlist-play--1").click(function() {
    myPlaylist.play(-1);
  });
  $("#playlist-play-0").click(function() {
    myPlaylist.play(0);
  });
  $("#playlist-play-1").click(function() {
    myPlaylist.play(1);
  });
  $("#playlist-play-2").click(function() {
    myPlaylist.play(2);
  });

  // The pause command

  $("#playlist-pause").click(function() {
    myPlaylist.pause();
  });

  // Changing the playlist options

  // Option: autoPlay

  $("#playlist-option-autoPlay-true").click(function() {
    myPlaylist.option("autoPlay", true);
  });
  $("#playlist-option-autoPlay-false").click(function() {
    myPlaylist.option("autoPlay", false);
  });

  // Option: enableRemoveControls

  $("#playlist-option-enableRemoveControls-true").click(function() {
    myPlaylist.option("enableRemoveControls", true);
  });
  $("#playlist-option-enableRemoveControls-false").click(function() {
    myPlaylist.option("enableRemoveControls", false);
  });

  // Option: displayTime

  $("#playlist-option-displayTime-0").click(function() {
    myPlaylist.option("displayTime", 0);
  });
  $("#playlist-option-displayTime-fast").click(function() {
    myPlaylist.option("displayTime", "fast");
  });
  $("#playlist-option-displayTime-slow").click(function() {
    myPlaylist.option("displayTime", "slow");
  });
  $("#playlist-option-displayTime-2000").click(function() {
    myPlaylist.option("displayTime", 2000);
  });

  // Option: addTime

  $("#playlist-option-addTime-0").click(function() {
    myPlaylist.option("addTime", 0);
  });
  $("#playlist-option-addTime-fast").click(function() {
    myPlaylist.option("addTime", "fast");
  });
  $("#playlist-option-addTime-slow").click(function() {
    myPlaylist.option("addTime", "slow");
  });
  $("#playlist-option-addTime-2000").click(function() {
    myPlaylist.option("addTime", 2000);
  });

  // Option: removeTime

  $("#playlist-option-removeTime-0").click(function() {
    myPlaylist.option("removeTime", 0);
  });
  $("#playlist-option-removeTime-fast").click(function() {
    myPlaylist.option("removeTime", "fast");
  });
  $("#playlist-option-removeTime-slow").click(function() {
    myPlaylist.option("removeTime", "slow");
  });
  $("#playlist-option-removeTime-2000").click(function() {
    myPlaylist.option("removeTime", 2000);
  });

  // Option: shuffleTime

  $("#playlist-option-shuffleTime-0").click(function() {
    myPlaylist.option("shuffleTime", 0);
  });
  $("#playlist-option-shuffleTime-fast").click(function() {
    myPlaylist.option("shuffleTime", "fast");
  });
  $("#playlist-option-shuffleTime-slow").click(function() {
    myPlaylist.option("shuffleTime", "slow");
  });
  $("#playlist-option-shuffleTime-2000").click(function() {
    myPlaylist.option("shuffleTime", 2000);
  });

  // Equivalent commands

  $("#playlist-equivalent-1-a").click(function() {
    myPlaylist.add({
      title:"Your Face",
      artist:"The Stark Palace",
      mp3:"http://www.jplayer.org/audio/mp3/TSP-05-Your_face.mp3",
      oga:"http://www.jplayer.org/audio/ogg/TSP-05-Your_face.ogg",
      poster: "http://www.jplayer.org/audio/poster/The_Stark_Palace_640x360.png"
    }, true);
  });

  $("#playlist-equivalent-1-b").click(function() {
    myPlaylist.add({
      title:"Your Face",
      artist:"The Stark Palace",
      mp3:"http://www.jplayer.org/audio/mp3/TSP-05-Your_face.mp3",
      oga:"http://www.jplayer.org/audio/ogg/TSP-05-Your_face.ogg",
      poster: "http://www.jplayer.org/audio/poster/The_Stark_Palace_640x360.png"
    });
    myPlaylist.play(-1);
  });

  // AVOID COMMANDS

  $("#playlist-avoid-1").click(function() {
    myPlaylist.remove(2); // Removes the 3rd item
    myPlaylist.remove(3); // Ignored unless removeTime=0: Where it removes the 4th item, which was originally the 5th item.
  });


});


//]]>
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

     
<div id="jp_container_N" class="jp-video jp-video-240p" role="application" aria-label="media player">
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



  // Click handlers for jPlayerPlaylist method demo

  // Audio mix playlist



</script>




    </body>
    
    
</html>
