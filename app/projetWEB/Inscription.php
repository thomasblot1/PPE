<html>

<h1>S'inscrire</h1>
	<form method="post" action="Inscription.php">
	<link href="bootstrap-3.3.7-dist/css/bootstrap.css" rel="stylesheet">
		<link href="css/inscription.css" rel="stylesheet">
		<h3>Nom: </h3>
		<input type="text" name="nom" id=name />
		<h3>Prenom: </h3>
		<input type="text" name="prenom" id=prenom />
		<h3>Mail: </h3>
		<input type="text" name="mail" id=mail />
		<h3>Photo de profil(sous forme de chemin): </h3>
		<h5>Ex: PhotoProfil/sarah.bragass.jpg</h5>
		<input type="text" name="Photo" id=Photo /></br></br>
		<h3>Votre CV:</h3></br>
		<textarea name="CV" rows="20" col="50" style="width:500px;height:100px;" id=CV /></textarea></br>
		<input type="submit" class="boutons" value="Valider la saisie" >
	</form>

<?php
$serveur="localhost";
$log="root";
$mdp="";
$bdd="reseausocial";
$connectique=mysqli_connect($serveur,$log,$mdp);
$con=mysqli_select_db($connectique,$bdd);
$Nom=isset($_POST['nom'])?$_POST['nom']:"";
$Prenom=isset($_POST['prenom'])?$_POST['prenom']:"";
$Mail=isset($_POST['mail'])?$_POST['mail']:"";
$Photo=isset($_POST['Photo'])?$_POST['Photo']:"";
$Destination="location.href='Connexion.php'";
$CV=isset($_POST['CV'])?$_POST['CV']:"";
$New=0;
if(!$connectique){
echo"pb de connection";}
else{
	//on construit la requête pour obtenir tous les utilisateurs actuellement inscrits
	$sql="SELECT * FROM table_utilisateurs;";
	//on envoie la requête et récupère la table
	$res=mysqli_query($connectique,$sql);
	//on traite le résultat
	while($data=mysqli_fetch_assoc($res)){
		//Cas Utilisateur existant
		if((($data['Nom']==$Nom)||($data['Prenom']==$Prenom))&&($data['Mail']==$Mail)){
			echo "Utilisateur déjà existant";
			$New=$New+1;
			echo "<input type='Button' value='Retour à la connexion.' Onclick=".$Destination.">";
		}
		else{//Cas Nouvelle personne
			$New=$New+0;
		}
	}
	//Résultat du précédent test
	if ($New==0){
		//3 tests pour savoir si l'un des paramètres est resté vide
		if ($Nom!=""){
				if($Prenom!=""){	
					if($Mail!=""){
						if($Photo!=""){
						$sq="INSERT INTO table_utilisateurs(Nom,Prenom,Mail,Photo,CV) VALUES('".$Nom."','".$Prenom."','".$Mail."','".$Photo."','".$CV."')";
						$resultate=mysqli_query($connectique,$sq);
						echo'Utilisateur ajoute';
						echo "<input type='Button' value='Valider l'inscription.' Onclick=".$Destination.">";}
						else{echo 'Pas de photo.';}
					}
				}
			}
		
	}
	else{echo "Utilisateur déjà existant ou problèmes.";}
}
?>
</br></br></br></br>
<footer>
<h5>Site de Cyprien Uhart-Jouet, de Sarah Bragas et de Thomas Blot</h5>
</footer>
</html>