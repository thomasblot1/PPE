<html>
<menu>
<link href="css/pagea.css" rel="stylesheet">
<div id="menu">
  <ul id="onglets">
    <li class="active"><a href="Accueil.php"> Accueil </a></li>
	<li><a href="Vous.php"> Vous </a></li>
    <li><a href="Reseau.php"> Reseau </a></li>
    <li><a href="Notif.php"> Notif </a></li>
    <li><a href="Emplois.php"> Emplois </a></li>
	<li><a href="AdministrateurTest.php"> Gestion des utilisateurs </a></li>
    <li><a href="Connexion.php"> Deconnexion </a></li>
  </ul>
</div>
</menu>
<script type="text/javascript" src="Accueil.js"></script>
<link href="css/Accueil.css" rel="stylesheet">
<link href="bootstrap-3.3.7-dist/css/bootstrap.css" rel="stylesheet">
<?php
echo'<h1>Accueil</h1>';
$serveur="localhost";
$log="root";
$mdp="";
$bdd="reseausocial";
$connectique=mysqli_connect($serveur,$log,$mdp);
$con=mysqli_select_db($connectique,$bdd);
if(!$connectique)
	echo"pb de connection";
else{
	$sq="SELECT * FROM publication ORDER BY Date DESC";
	$resultate=mysqli_query($connectique,$sq);$compteur=1;
while($tab=mysqli_fetch_assoc($resultate)){	
			$like=$tab['nb_like'];
			
			
			
			echo'
			

		<div class="col-lg-4">
		<fieldset class="row">	
		<legend>'.$tab['Contenu_texte'].'</legend>
		'.$tab['Date'].'
		</br><img src="'.$tab['chemin'].'" alt="photo" height="500" width="500">
		<h4>Description</h4></br>'.$tab['Description'].'</br>'.'
		<form name="Accueil" method="post" action="Accueil.php">
		<input type="button" name="Like" onclick="like(.$like)" value="like"/>';
		$likeupdate="UPDATE publication set nb_like ='".$like."' WHERE ID_publication='".$tab['ID_publication']."'";
		mysqli_query($connectique,$likeupdate);
		echo'
		<input type="button" value="Share" name="Share"></br>
		</form>
		'.$tab['nb_like'].'
		</fieldset>
		</div>';
		$compteur=$compteur+1;
		
	}	
}

?>

</html>
