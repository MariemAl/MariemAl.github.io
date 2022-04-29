<?php 
   session_start();
   if($_SESSION[ "autoriser" ]!="oui"){
       index("location:login.php");
       exit();
   }

$pagetitle="Session Adminestrateur :";

?>
<div>
     <button><a href="deconnexion.php">Déconnexion</a></button>
                       
</div>

<div> <button><a href="index.php?controller=catalogue&action=readall">Consulter la liste des catalogues</a></button> </div>