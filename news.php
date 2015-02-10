
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
    <title>News</title>

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
	  <style>
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: 70%;
      margin: auto;
  }
  h2,p
  {
	  color: black;
  }
  h3
  {
	  color:#FFFFFF;
  }
  </style>
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
                    
                    <li><a href="accueil.php"><i class="fa fa-bullseye"></i> Accueil</a></li>
                    <li class="selected"><a href="./genres.php"><i class="fa fa-tasks"></i> Genres</a></li>
                    <li><a href="./news.php"><i class="fa fa-globe"></i> News</a></li>                  
                    <li><a href="./artistes.php"><i class="fa fa-list-ul"></i> Artistes</a></li>
                    <li><a href="#"><i class="fa fa-list-ol"></i> Charts</a></li>
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
                 
            </div>
        </nav>

     

            <div  class="row">

<div class="container">
  <br>
  <div id="myCarousel" class="carousel slide col-xs-4 col-xs-offset-1" data-ride="carousel" style="height:350px;width:900px;">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">

      <div class="item active">
        <img src="img/capture3.png" alt="Chania" width="260" height="200">
                 <div class="carousel-caption">
The atmosphere in Chania has a touch of Florence and Venice.
        </div> 

      </div>

      <div class="item">
        <img src="img/capture5.png" alt="Chania" width="260" height="200">
        <div class="carousel-caption">
       
          The atmosphere in Chania has a touch of Florence and Venice.
        </div>
      </div>
    
      <div class="item">
        <img src="img/capture3.png" alt="Flower" width="360" height="100">
        <div class="carousel-caption">

          Beatiful flowers in Kolymbari, Crete.
        </div>
      </div>

      <div class="item">
        <img src="img/capture6.png" alt="Flower" width="360" height="100">
        <div class="carousel-caption">
          Beatiful flowers in Kolymbari, Crete.
        </div>
      </div>
  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div><!-- /.carousel -->


    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing  col-xs-4 col-xs-offset-1" data-ride="carousel" style="width:900px;"

      <!-- START THE FEATURETTES -->

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading">First featurette heading. <span class="text-muted">It'll blow your mind.</span></h2>
          <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
        </div>
        <div class="col-md-5">
          <img class="featurette-image img-responsive" src="img/capture5.png" alt="Generic placeholder image">
        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-5">
          <img class="featurette-image img-responsive" src="img/capture3.png" alt="Generic placeholder image">
        </div>
        <div class="col-md-7">
          <h2 class="featurette-heading">Oh yeah, it's that good. <span class="text-muted">See for yourself.</span></h2>
          <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading">And lastly, this one. <span class="text-muted">Checkmate.</span></h2>
          <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
        </div>
        <div class="col-md-5">
          <img class="featurette-image img-responsive" src="img/capture2.png" alt="Generic placeholder image">
        </div>
      </div>

      <hr class="featurette-divider">

      <!-- /END THE FEATURETTES -->
	  
	        <!-- Three columns of text below the carousel -->
      <div class="row">
        <div class="col-lg-4">
          <img class="img-circle" src="img/capture2.png" alt="Generic placeholder image" style="width: 140px; height: 140px;">
          <h2>Heading</h2>
          <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
          <p><a class="btn btn-default" href="#" role="button">Voir détails &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img-circle" src="img/capture3.png" alt="Generic placeholder image" style="width: 140px; height: 140px;">
          <h2>Heading</h2>
          <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
          <p><a class="btn btn-default" href="#" role="button">Voir détails &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img-circle" src="img/capture5.png" alt="Generic placeholder image" style="width: 140px; height: 140px;">
          <h2>Heading</h2>
          <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
          <p><a class="btn btn-default" href="#" role="button">Voir détails &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->

      <!-- FOOTER -->
      <footer>
        <p class="pull-right"><a href="#">Revenir en haut de la page</a></p>
        <p>&copy; 2014 Company, ZikOn &middot; </p>
      </footer>

    </div><!-- /.container -->

  </div>




    </div>
    <!-- /#wrapper -->
    
    
  <script type="text/javascript">
  function validateEmail(email) {   
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
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



function afficherGenre(genreId){

  //$("#liste1").hide();
  $.ajax({
        type:       "POST",
        cache:      false,
        url:        "./gestionGenres.php",
        data:       "genre="+genreId,
        dataType : 'html', // On désire recevoir du HTML
        success : function(code_html, statut){ // code_html contient le HTML renvoyé
           $("#liste1").html(code_html);
           //alert(code_html);
       }
    }); 
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
</script>




    </body>
    
    
</html>
