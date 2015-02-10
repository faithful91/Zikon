<!DOCTYPE html>

<?php

if(isset($_POST['login']) && isset($_POST['pass'])) 
{
                $base = mysqli_connect ('localhost', 'root', 'root','zikon');  
                                $login = mysqli_real_escape_string($base,$_POST['login']);
                                $password = mysqli_real_escape_string($base,$_POST['pass']);
$reponse = mysqli_query("SELECT * FROM comptesutilisateurs WHERE login = 'aazz' AND password = 'aazz'") or die('Ca marche pas'); 

if (mmysql_num_rows($reponse) < 1)   
{ 

Header("Location: genres.php");} 
else  
{    

  Header("Location: genres.php");
} 
}


 if (isset ($_POST['nom'])){
                $base = mysqli_connect ('localhost', 'root', 'root','zikon');  

                              $nom = mysqli_real_escape_string($base,$_POST['nom']);
                                $email=mysqli_real_escape_string($base,$_POST['email']);
                                $pass = mysqli_real_escape_string($base,$_POST['pass']);
                   
                 $sql=('INSERT INTO comptesutilisateurs(nom, login, password) VALUES ("'.$nom.'", "'.$email.'","'.$pass.'");');

                              mysqli_query ($base,$sql) or die ('Erreur SQL !'.$sql.'<br />'.mysqli_error($base)); 
                          }






?>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Fullscreen Contact Form</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=PT+Sans:400,700">
        <link rel="stylesheet" href="assets/css/reset.css">
        <link rel="stylesheet" href="assets/css/style.css">

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />


    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>


    </head>

    <body>

        <div id="iden" style="display:block;" >
            
            <form class="inscri" action="login2.php" method="post" onsubmit="return validate()">
                <input id="email" type="text" name="login" class="name" placeholder="Email...">
                <input type="password" name="pass" class="email" placeholder="Mot de passe...">
                <button type="submit">Connextion</button>
                 
            </form>
        </div>

        <!-- Javascript -->
        <script src="assets/js/jquery-1.10.2.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>

        <div class="switch-button">
           
        </div>




        <div id="inscription" style="display:none;" >
            
            <form class="inscri" action="ident.php" method="post">
                <input type="text" name="nom" class="name" placeholder="Nom...">
                
                <input type="text" name="email" class="email" placeholder="E-Mail...">
                <input type="password" name="pass" class="email" placeholder="Password...">
                <input type="password" name="cpassemail" class="email" placeholder="Confirme Password...">



               
                <button type="submit">S'inscrire</button>
            
            </form>

        </div>
       <div id="msg"></div>

        <!-- Javascript -->
        <script src="assets/js/jquery-1.10.2.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>

        <div class="switch-button">
           
        </div>


    
<script type="text/javascript">
$(document).ready(function(){
    var i=true;
   $('.switch-button').click(function(){
     $(this).toggleClass("switchOn");
     if(i==true)
        {             document.getElementById('iden').style.display = 'none';
                      document.getElementById('inscription').style.display = 'block';
                        i=false;}
    else {           document.getElementById('iden').style.display = 'block';
                     document.getElementById('inscription').style.display = 'none';

                        i=true}
    
     console.log(i);

   });
});
function validateEmail(email) {   
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}
function validate(){
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
</script>
    </body>

</html>

