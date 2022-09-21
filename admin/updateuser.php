<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../css/style.css" />
</head>
<body>
<?php
include "../app/connexionpdo.php";

$query = $bdd->prepare("SELECT * FROM information ");
$ok = $query->execute();
$result = $query->fetchAll(5);

	$list_user = array();
	if ($query && $ok) {
		foreach ($result as $lig) {
				$user = array();
				$user['id'] = $lig->id;
				$user['mail'] = $lig->mail;
				$user['mdp'] = $lig->mdp;
				$user['prenom'] = $lig->prenom;
				$user['nom'] = $lig->nom;
				$list_user[] = $user;
		}
		$query->closeCursor();
	}

?>
<table class="zebre">
			<thead>
				<tr>
					<th>ID</th>
					<th>prénom</th>
					<th>Nom</th>
					<th>mail</th>


				</tr>
			</thead>
			<tbody>
<?php
	foreach($list_user as $user) {
?>
				<tr>
					<td> <?php echo $user['id']; ?></td>
					<td> <?php echo $user['prenom']; ?></td>
					<td> <?php echo $user['nom']; ?></td>
					<td> <?php echo $user['mail']; ?></td>
					<td> <a href=" ./edituser.php?id=<?php echo $user['id']; ?>" class="card-link">Modifier</a></td>
					<td> <a href=" ../traitement/suppruser.php?id=<?php echo $user['id']; ?>"> Supprimer </a> </td>

				</tr>
<?php
	}
?>
			</tbody>
		</table>


</body>
</html>

