<?php
 // TODO - afficher le nom de l'entreprise ou du client.
?>

 <p> Supprimer votre compte ? </p>

 <form method='post' action='interface/commun/action/Compte.php'>

   <label for='mdp'>Mot de passe</label>
   <input type="text" name="mdp"/>

   <button type="submit" name="send" value="supprimer">Supprimer</button>
 </form>
