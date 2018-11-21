<?php
$url_connexion_client = getUrl("index.php", array("action" => "connexionClient"));
$url_connexion_commerce = getUrl("index.php", array("action" => "connexionCommerce"));
?>

<ul>
	<li>
		<a href="
		<?php
			echo $url_connexion_client;
		?>"
		>Se connecter en tant que client</a>
	</li>
	<li>
		<a href="
		<?php
			echo $url_connexion_commerce;
		?>"
		>Se connecter en tant que commerce</a>
	</li>
</ul>
