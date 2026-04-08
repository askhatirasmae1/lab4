<?php
require_once 'racine.php';
require_once RACINE.'/service/EtudiantService.php';

$es=new EtudiantService();
$etudiants=$es->findAll();
?>

<h2>Ajouter Etudiant</h2>

<form method="post" action="controller/addEtudiant.php">
<input name="nom" required placeholder="Nom"><br>
<input name="prenom" required placeholder="Prenom"><br>
<input name="ville" required placeholder="Ville"><br>
<select name="sexe">
<option value="M">M</option>
<option value="F">F</option>
</select>
<button>Ajouter</button>
</form>

<h2>Liste</h2>

<table border="1">
<tr>
<th>ID</th><th>Nom</th><th>Prenom</th><th>Ville</th><th>Sexe</th><th>Action</th>
</tr>

<?php foreach($etudiants as $e){ ?>
<tr>
<td><?= $e->getId() ?></td>
<td><?= $e->getNom() ?></td>
<td><?= $e->getPrenom() ?></td>
<td><?= $e->getVille() ?></td>
<td><?= $e->getSexe() ?></td>
<td>
<a href="controller/deleteEtudiant.php?id=<?= $e->getId() ?>">Delete</a>
</td>
</tr>
<?php } ?>

</table>