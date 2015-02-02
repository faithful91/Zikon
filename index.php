
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
    <title>ZikOn-Accueil</title>

    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="css/local.css" />

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>


    
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
                    
                    <li class="selected"><a href="index.html"><i class="fa fa-bullseye"></i> Accueil</a></li>
                    <li><a href="./genres.php"><i class="fa fa-tasks"></i> Genres</a></li>
                    <li><a href="#"><i class="fa fa-globe"></i> News</a></li>                  
                    <li><a href="#"><i class="fa fa-list-ul"></i> Artistes</a></li>
                    <li><a href="#"><i class="fa fa-list-ol"></i> Charts</a></li>
                    <li><a href="#"><i class="fa fa-table"></i> Agenda</a></li>
                    
                    <!-- <img src="img/logo4.png" alt="ZikOn" style="width:225px;height:100px"> -->
                    
                </ul>

                 <form class="navbar-form navbar-right" role="search">

                    <div class="form-group">
                        
                        <input type="text" class="form-control" name="username" placeholder="Username" id="email">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="password" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-default" id="validate" onClick="ajouteElement()">Sign In</button>
                </form>
            </div>
        </nav>

     

            <div class="row">
                <div class="col-lg-12">
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
$reponse = $bdd->query('SELECT * FROM albums');
?>

<div class="row">

<?php
// On affiche chaque entrée une à une
while ($donnees = $reponse->fetch())
{
?>
  <div class="col-lg-3 col-sm-3 col-xs-12">
    <strong> <?php echo $donnees['cover']; ?> </strong>
          <a href="#">
             <img src="<?php echo $donnees['cover']; ?>" class="thumbnail img-responsive">
          </a>
  </div>

   
<?php
}

$reponse->closeCursor(); // Termine le traitement de la requête

?>
</div>
  <!--
  <div class="row">
    <div class="col-lg-4 col-sm-6 col-xs-12">
        <a href="#">
             <img src="http://placehold.it/800x600" class="thumbnail img-responsive">
        </a>
    </div>
     <div class="col-lg-4 col-sm-6 col-xs-12">
        <a href="#">
             <img src="http://placehold.it/800x600" class="thumbnail img-responsive">
        </a>
    </div>
     <div class="col-lg-4 col-sm-6 col-xs-12">
        <a href="#">
             <img src="http://placehold.it/800x600" class="thumbnail img-responsive">
        </a>
    </div>
     <div class="col-lg-4 col-sm-6 col-xs-12">
        <a href="#">
             <img src="http://placehold.it/800x600" class="thumbnail img-responsive">
        </a>
    </div>
     <div class="col-lg-4 col-sm-6 col-xs-12">
        <a href="#">
             <img src="http://placehold.it/800x600" class="thumbnail img-responsive">
        </a>
    </div>
     <div class="col-lg-4 col-sm-6 col-xs-12">
        <a href="#">
             <img src="http://placehold.it/800x600" class="thumbnail img-responsive">
        </a>
    </div>
     <div class="col-lg-4 col-sm-6 col-xs-12">
        <a href="#">
             <img src="http://placehold.it/800x600" class="thumbnail img-responsive">
        </a>
    </div>
     <div class="col-lg-4 col-sm-6 col-xs-12">
        <a href="#">
             <img src="http://placehold.it/800x600" class="thumbnail img-responsive">
        </a>
    </div>
     <div class="col-lg-4 col-sm-6 col-xs-12">
        <a href="#">
             <img src="http://placehold.it/800x600" class="thumbnail img-responsive">
        </a>
    </div>
  </div>
  -->
  

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
    $("#result").text(email + " is valid :)");
    $("#result").css("color", "green");
  } else {
    $("#result").text(email + " is not valid :(");
    $("#result").css("color", "red");
  }
  return false;
}
$("form").bind("submit", validate);
</script>
    
    
    
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
  } else {
    $("#result").text(email + " is not valid :(");
    $("#result").css("color", "red");
  }
  return false;
}
$("form").bind("submit", validate);





function ajouteElement() 
{  var email = $("#email").val();

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
    <script>
        
        
    </script>




    </body>
    
    
</html>