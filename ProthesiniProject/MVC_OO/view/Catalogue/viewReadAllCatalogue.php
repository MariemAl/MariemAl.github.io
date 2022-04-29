
<?php

  foreach ($tab_u as $u){ ?>
    <th> <?php echo "  Label : </h3> ".$u->getLabel()."</h3>";
    require_once($ROOT.$DS."view".$DS."viewOpenProduit".$u.".php");
  }
?>


