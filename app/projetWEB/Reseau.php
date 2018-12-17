<html>
	<menu>
		<link href="css/pageres.css" rel="stylesheet">
		<div id="menu">
		  <ul id="onglets">
			<li><a href="Accueil.php"> Accueil </a></li>
			<li><a href="Vous.php"> Vous </a></li>
			<li class="active"><a href="Reseau.php"> Reseau </a></li>
			<li><a href="Notif.php"> Notif </a></li>
			<li><a href="Emplois.php"> Emplois </a></li>
			<li><a href="AdministrateurTest.php"> Gestion des utilisateurs </a></li>
			<li><a href="Connexion.php"> Deconnexion </a></li>
		  </ul>
		</div>
	</menu>

	<link href="bootstrap-3.3.7-dist/css/bootstrap.css" rel="stylesheet">
	<?php
	echo'<h1>Mon réseau</h1>';
	echo"<h4>Pour l'instant, tous les utilisateurs sont amis.</h4>";
	$serveur="localhost";
	$log="root";
	$compteur=1;
	$mdp="";
	$bdd="reseausocial";
	$connectique=mysqli_connect($serveur,$log,$mdp);
	$con=mysqli_select_db($connectique,$bdd);
	if(!$connectique)
		echo"pb de connection";
	else{
		$sq="SELECT * FROM table_utilisateurs";
		$resultate=mysqli_query($connectique,$sq);$compteur=1;
		while($tab=mysqli_fetch_assoc($resultate)){	
			echo'
				<section class="col-lg-4">
					<fieldset style= "width:400px;padding:20px;margin-left:100px;margin-bottom:100px;">
						<legend>Ami '.$compteur.' : </legend>'.
						'Nom:'.$tab['Nom'].'</br>
						Prénom:'.$tab['Prenom']."</br>
						Mail :".$tab['Mail'].'</br>'.
						'<img src="'.$tab['Photo'].'" alt="photo" height="200" width="200">
					</fieldset>
				</section>';
			$compteur=$compteur+1;
		}	
	}
	?>
</html>