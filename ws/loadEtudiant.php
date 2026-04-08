<?php
require_once dirname(__DIR__).'/racine.php';
require_once RACINE.'/service/EtudiantService.php';

header('Content-Type: application/json');

$es=new EtudiantService();
echo json_encode($es->findAllApi());