<?php
require_once dirname(__DIR__).'/racine.php';
require_once RACINE.'/service/EtudiantService.php';

$id=intval($_GET['id']);
$es=new EtudiantService();

$e=$es->findById($id);
if($e) $es->delete($e);

header("Location:../index.php");