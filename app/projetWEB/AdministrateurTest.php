<html>

<menu>
<link href="css/AdministrateurTest1.css" rel="stylesheet">
<div id="menu">
  <ul id="onglets">
    <li><a href="Accueil.php"> Accueil </a></li>
	<li><a href="Vous.php"> Vous </a></li>
    <li><a href="Reseau.php"> Reseau </a></li>
    <li><a href="Notif.php"> Notif </a></li>
    <li><a href="Emplois.php"> Emplois </a></li>
  	<li class="active"><a href="AdministrateurTest.php"> Gestion des utilisateurs </a></li>
    <li><a href="Connexion.php"> Deconnexion </a></li>
  </ul>
</div>
</menu>

<form method="post" action="AdministrateurTest.php">
	<h1>Administrateur - Accès</h1>
	<h3>Nom:</h3>
	<input type="text" name="nom" id=nom />
	<h3>Prénom:</h3>
	<input type="text" name="prenom" id=prenom />
	<h3>Mail:</h3>
	<input type="text" name="mail" id=mail />
	<input type='submit' class="boutons" value='Valider la sélection'>
	<form>

</html>

<?php
	$bdd="reseausocial";
	$connect=mysqli_connect('localhost','root','');
	$connect1=mysqli_select_db($connect,$bdd);
	$Mail = isset($_POST['mail'])?$_POST['mail']:"";
	$Nom = isset($_POST['nom'])?$_POST['nom']:"";
	$Prenom = isset($_POST['prenom'])?$_POST['prenom']:"";

	if(!$connect)
	echo"pb de connection";
else{
	if($Mail!=""){
		if($Prenom!=""){
			if($Nom!=""){
				$sql="SELECT * FROM table_utilisateurs";
				$res=mysqli_query($connect,$sql);
				while($data=mysqli_fetch_assoc($res)){
					if(($data['Nom']==$Nom)&&($data['Prenom']==$Prenom)&&($data['Mail']==$Mail)){
						echo "Vous n'êtes pas un administrateur.";
						header("Location:AdministrateurTest.php");
					}
					else{
						header("Location:Administrateur.php");
					}
				}
				echo"Problèmes";
			}
		}
	}
}		
?>
