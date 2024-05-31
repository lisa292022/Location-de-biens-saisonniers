<?php
require_once ('../include/connexion.inc.include');

class Activite {
    private $id_activite, $description, $code;

    public function __construct($id_activite) {
        $this->id_activite = $id_activite;
    }

    public function getId_activite() {
        return $this->id_type_bien;
    }
    public function getDescription (){
        return $this->lib_type_bien;
    }
    public function getCode (){
        return $this->code;
    }

    public function setId_activite($id_activite) {
         $this->id_activite = $id_activite;
    }
    public function setDescription ($description){
        $this->description = $description;
    }
    public function setCode($code){
        $this->code = $code;
    }

    public function getAllActivite() {
        $sql = "SELECT * FROM activite";
        $code = $this->code;
        $stmt = $code->Query($sql);
        return $stmt;
    }
    
    public function getAllActiviteBien($id_bien) {
        $sql = "SELECT * FROM possede WHERE id_bien=".$id_bien;
        $code = $this->code;
        $stmt = $code->Query($sql);
        return $stmt;
        }
    
    public function getOneActivite($id_activite) {
        $sql = "SELECT * FROM activite WHERE id_activite= ".$id_activite;
        $code = $this->code;
        $stmt = $code->Query($sql);
        return $stmt;
    }
    
    public function getLibActivite($id_activite) {
        $sql = "SELECT * FROM activite WHERE id_activite= ".$id_activite;
        $code = $this->code;
        $stmt = $code->Query($sql);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['description'];
    }

    public function getIdActivite($description) {
        $sql = "SELECT * FROM activite WHERE description= '".$description."'";
        $code = $this->code;
        $stmt = $code->Query($sql);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['id_activite'];
    }    
    
    public function insertActivite($description) {
        $sql = "INSERT INTO activite (description) VALUES ('". $description."')";
        $code = $this->code;
        $stmt=$code->Query($sql);
        return $stmt;
    }

    public function updateActivite($id_activite, $description) {
        $sql = "UPDATE activite SET description= '".$description."' WHERE id_activite='".$id_activite."'";
        $code = $this->code;
        $stmt=$code->Query($sql);
        return $stmt;
    }

    public function deleteActivite($id_activite) {
        $sql = "DELETE FROM activite WHERE id_activite='".$id_activite."'";
        $code = $this->code;
        $stmt=$code->Query($sql);
        return $stmt;
    }
    
    public function IsPresentActiviteBien($id_bien,$id_activite) {
        $sql = "SELECT * FROM possede WHERE id_bien=".$id_bien." AND id_activite=".$id_activite;
        $code = $this->code;
        $stmt = $code->Query($sql);
        return $stmt;
    }
    
    public function deleteActiviteBien($id_bien,$id_activite) {
        $sql = "DELETE FROM possede WHERE id_bien=".$id_bien." AND id_activite=".$id_activite;
        $code = $this->code;
        $stmt=$code->Query($sql);
        return $stmt;
    }
    
    public function insertActiviteBien($id_bien,$id_activite) {
        $sql = "INSERT INTO possede (id_bien,id_activite) VALUES ('". $id_bien."','".$id_activite."')"; 
        $code = $this->code;
        $stmt=$code->Query($sql);
        return $stmt;
    }
}
?>
