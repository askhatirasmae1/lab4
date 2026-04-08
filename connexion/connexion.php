<?php
class Connexion {
  private PDO $cn;

  public function __construct(){
    try{
      $this->cn = new PDO(
        "mysql:host=localhost;dbname=school1;charset=utf8mb4",
        "root",
        "",
        [
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
      );
    }catch(Exception $e){
      die("Erreur BD: ".$e->getMessage());
    }
  }

  public function getConnexion(): PDO{
    return $this->cn;
  }
}