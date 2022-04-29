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

<div>

<div> <button><a href="index.php?controller=utilisateur&action=readall">Consulter la liste des clients</a></button> </div>
<div> <button><a href="index.php?controller=catalogue&action=readall">Consulter la liste des catalogues</a></button> </div>
<div> <button><a href="index.php?controller=produit&action=create">Ajouter un produit</a></button> </div>
<div> <button><a href="index.php?controller=produit&action=update">Modifier un produit</a></button> </div>
<div> <button><a href="index.php?controller=produit&action=delete">Supprimer un produit</a></button> </div>

</div> 