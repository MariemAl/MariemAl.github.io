<?php
   session_start()
   @$user=$_POST[ "email" ];
   @$pass=$_POST[ "mdp" ];
   @$valider=$_POST[ "connexion" ];
   $erreur="";

/*confirmer si l'utilisateur clique sur <submit> */ 
if(isset($connexion)) {
    if($user==$user::login() && $pass==md5($pass::login()) && $role="1"){
        $_SESSION[ "autoriser" ]="oui" ;
        header("location:interfaceAdmin.php");
    } elseif ($user==$user::login() && $pass==$pass::login() && $role="2") {
        $_SESSION[ "autoriser" ]="oui" ;
        header("location:interfaceClient.php");
    } else {
        $erreur="Mauvais login ou mot de passe";
    }
}
?>

<form method="post" action="interface.php">
<fieldset>
                       <legend>Log In </legend>
                       <div class="mb-3">
                         <label for="email">E-mail :</label>
                         <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Saisir votre E-mail" size=40px/>
                       </div>
                    
                       <div class="mb-3">
                         <label for="mdp">Mot de passe :</label>
                         <input type="password" class="form-control" name="mdp"  placeholder="Saisir votre mdp" class="in-forForm1" size=40px />
                       </div >
                    
                       <div>
                         <input type="submit" class="btn btn-primary" value="connexion " id="button">
                       
                       </div>
                   </fieldset>
</form>
