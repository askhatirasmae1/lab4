<?php
require_once dirname(__DIR__).'/racine.php';
require_once RACINE.'/service/EtudiantService.php';

header('Content-Type: application/json');

$nom=$_POST['nom']??'';
$prenom=$_POST['prenom']??'';
$ville=$_POST['ville']??'';
$sexe=$_POST['sexe']??'';

$es=new EtudiantService();
$es->create(new Etudiant(null,$nom,$prenom,$ville,$sexe));

echo json_encode(["success"=>true]);