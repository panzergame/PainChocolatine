<?php

$client = clientConnecte();
$commerce = commerceConnecte();

if ($client !== null) {
    include_once "client/listerStatistique.php";
}
else if ($commerce !== null) {
    include_once "commerce/listerStatistique.php";
}

?>
