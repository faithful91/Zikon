
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
    <title>Genres</title>

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
                session_start ();
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

     

           
  <h2 id='result'></h2>
   <table class="table table-hover" style="color:#A2A2A2;background-color:#FFFFFF;">
    <tr>
      <th>Titre</th> 
      <th>Album</th>
      <th>Artiste</th>  
    </tr>
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

$query = "SELECT * FROM titres where id IN(".implode(',',$_SESSION['playlist']).")";
$reponse = $bdd->query($query );

// On affiche chaque entrée une à une

while ($donnees = $reponse->fetch())
{
?>
  <tr>
         <td> <?php echo $donnees['nom']; ?> </td>
          <td></td>
          <td></td>
  </tr>

   
<?php
}

$reponse->closeCursor(); // Termine le traitement de la requête

?>
</table>

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
</script>




    </body>
    
    
</html>
