<?php
class Etudiant {
  private ?int $id;
  private string $nom;
  private string $prenom;
  private string $ville;
  private string $sexe;

  public function __construct($id=null,$nom="",$prenom="",$ville="",$sexe=""){
    $this->id=$id;
    $this->nom=$nom;
    $this->prenom=$prenom;
    $this->ville=$ville;
    $this->sexe=$sexe;
  }

  public function getId(){return $this->id;}
  public function getNom(){return $this->nom;}
  public function getPrenom(){return $this->prenom;}
  public function getVille(){return $this->ville;}
  public function getSexe(){return $this->sexe;}

  public function setId($id){$this->id=$id;}
  public function setNom($n){$this->nom=$n;}
  public function setPrenom($p){$this->prenom=$p;}
  public function setVille($v){$this->ville=$v;}
  public function setSexe($s){$this->sexe=$s;}
}