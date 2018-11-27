<?php

include_once "../../../include/db/session.php";

deconnecterClient();
deconnecterCommerce();

Header("Location: ../../../index.php");
?>
