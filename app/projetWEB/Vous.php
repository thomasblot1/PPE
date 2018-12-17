<html>
		<header>
			<menu>
			<link href="bootstrap-3.3.7-dist/css/bootstrap.css" rel="stylesheet">
				<link href="css/Vous1.css" rel="stylesheet">
				<div id="menu">
					<ul id="onglets">
						<li><a href="Accueil.php"> Accueil </a></li>
						<li class="active"><a href="Vous.php"> Vous </a></li>
						<li><a href="Reseau.php"> Reseau </a></li>
						<li><a href="Notif.php"> Notif </a></li>
						<li><a href="Emplois.php"> Emplois </a></li>
						<li><a href="AdministrateurTest.php"> Gestion des utilisateurs </a></li>
						<li><a href="Connexion.php"> Deconnexion </a></li>
					</ul>
				</div>
			</menu>
		</header>
		<body>
			<?php
			
			echo'<h1>Profil</h1>';
			$tab=null ;
			$table=null;
			
			$serveur="localhost";
			$log="root";
			$mdp="";
			$bdd="reseausocial";
			$connectique=mysqli_connect($serveur,$log,$mdp);
			$con=mysqli_select_db($connectique,$bdd);
			if(!$connectique)
				echo"pb de connection";
			else{
				$sqlco="SELECT Mail FROM session WHERE Connecte='1'";
				$resultatco=mysqli_query($connectique,$sqlco);
				$tabco=mysqli_fetch_assoc($resultatco);
				$sq="SELECT * FROM table_utilisateurs WHERE Mail='".$tabco['Mail']."'";
				$sqf="SELECT * FROM table_admin WHERE Mail='".$tabco['Mail']."'";
				$resultatadmin=mysqli_query($connectique,$sqf);	
				$resultate=mysqli_query($connectique,$sq);	
				try{
				while(($table=mysqli_fetch_assoc($resultatadmin))||$tab=mysqli_fetch_assoc($resultate)){	
					echo'</br>
					<div class="col-lg-5">
					<img src="'.$tab['Photo'].$table['Photo'].'"alt="photo" height="200" width="200"></br>
					Nom:'.$tab['Nom'].$table['Nom'].'</br>
					Prenom:'.$tab['Prenom'].$table['Prenom']."</br>
					Mail:".$tab['Mail'].$table['Mail'].'
					</div>
					<div class="col-lg-5">CV:</br>'.$tab['CV'].$table['CV'].'
					</div>';
				}
				}
				catch(monException $e){
					echo'</br>
					<div class="col-lg-5">
					<img src="'.$table['Photo'].'"alt="photo" height="200" width="200"></br>
					Nom:'.$table['Nom'].'</br>
					Prenom:'.$table['Prenom']."</br>
					Mail:".$table['Mail'].'
					</div>
					<div class="col-lg-5">CV:</br>'.$table['CV'].'
					</div>';
				}
			}
			?>
			<div class="marge">
				<h1>Ajout d'une publication</h1>
				<input type="button" class=bouton value="Multimedia" Onclick="location.href='PublicationAjoutImageVideo.php'">
				<input type="button" class=bouton value="Evenement" Onclick="location.href='PublicationAjoutEvent.php'">
				<h1>Suppression d'une publication</h1>
				<input type="button" class=bouton value="Supprimer" Onclick="location.href='PublicationSuppression.php'">
			</div>
		</body>
</html>