<?php
require_once dirname(__DIR__).'/racine.php';

require_once RACINE.'/classes/Etudiant.php';
require_once RACINE.'/connexion/Connexion.php';
require_once RACINE.'/dao/IDao.php';

class EtudiantService implements IDao {

  private Connexion $cn;

  public function __construct(){
    $this->cn = new Connexion();
  }

  public function create($o){
    $sql="INSERT INTO Etudiant(nom,prenom,ville,sexe)
          VALUES(:nom,:prenom,:ville,:sexe)";
    $req=$this->cn->getConnexion()->prepare($sql);
    $req->execute([
      ':nom'=>$o->getNom(),
      ':prenom'=>$o->getPrenom(),
      ':ville'=>$o->getVille(),
      ':sexe'=>$o->getSexe()
    ]);
  }

  public function delete($o){
    $sql="DELETE FROM Etudiant WHERE id=:id";
    $req=$this->cn->getConnexion()->prepare($sql);
    $req->execute([':id'=>$o->getId()]);
  }

  public function update($o){
    $sql="UPDATE Etudiant SET nom=:nom,prenom=:prenom,ville=:ville,sexe=:sexe WHERE id=:id";
    $req=$this->cn->getConnexion()->prepare($sql);
    $req->execute([
      ':nom'=>$o->getNom(),
      ':prenom'=>$o->getPrenom(),
      ':ville'=>$o->getVille(),
      ':sexe'=>$o->getSexe(),
      ':id'=>$o->getId()
    ]);
  }

  public function findAll(){
    $sql="SELECT * FROM Etudiant ORDER BY id DESC";
    $req=$this->cn->getConnexion()->query($sql);

    $list=[];
    while($e=$req->fetch(PDO::FETCH_OBJ)){
      $list[] = new Etudiant($e->id,$e->nom,$e->prenom,$e->ville,$e->sexe);
    }
    return $list;
  }

  public function findById($id){
    $sql="SELECT * FROM Etudiant WHERE id=:id";
    $req=$this->cn->getConnexion()->prepare($sql);
    $req->execute([':id'=>$id]);

    $e=$req->fetch(PDO::FETCH_OBJ);
    if(!$e) return null;

    return new Etudiant($e->id,$e->nom,$e->prenom,$e->ville,$e->sexe);
  }

  // API JSON
  public function findAllApi(){
    $sql="SELECT * FROM Etudiant";
    $req=$this->cn->getConnexion()->query($sql);
    return $req->fetchAll(PDO::FETCH_ASSOC);
  }
}