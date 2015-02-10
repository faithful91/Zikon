<?php
// On définit un login et un mot de passe de base pour tester notre exemple. Cependant, vous pouvez très bien interroger votre base de données afin de savoir si le visiteur qui se connecte est bien membre de votre site


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
$req = $bdd->prepare('SELECT * FROM comptesutilisateurs WHERE login = ? AND password = ?');
$req->execute(array($_POST['login'],$_POST['pwd']));


  $compteur = 0;
  while ($donnees = $req->fetch()){
    $compteur ++; 
        
      // dans ce cas, tout est ok, on peut démarrer notre session

      // on la démarre :)
      session_start ();
      // on enregistre les paramètres de notre visiteur comme variables de session ($login et $pwd) (notez bien que l'on utilise pas le $ pour enregistrer ces variables)
      $_SESSION['login'] = $_POST['login'];
      $_SESSION['pwd'] = $_POST['pwd'];
      $_SESSION['nom'] = $donnees['nom'];
      $_SESSION['playlist']= [];
      // on redirige notre visiteur vers une page de notre section membre
      header ("Location: $_SERVER[HTTP_REFERER]" );
}
if($compteur == 0){
  // Le visiteur n'a pas été reconnu comme étant membre de notre site. On utilise alors un petit javascript lui signalant ce fait
    echo '<body onLoad="alert(\'Membre non reconnu...\')">';
    // puis on le redirige vers la page d'accueil
    header ("Location: $_SERVER[HTTP_REFERER]" );
}

?>