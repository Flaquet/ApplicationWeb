<?php
class User
{
    private $_id;
    private $_Nom;
    public function __construct($id, $nom)
    {
        $this->_id = $id;
        $this->_Nom = $nom;
    }
    public function getId()
    {
        return $this->_id;
    }
    public function getNom()
    {
        return $this->_Nom;
    }

    public function afficherUser(){
        echo "votre l'id est  ".$this->_id." est le nom est ".$this->_Nom;
    }

    public function deleteUser(){
        echo "votre l'id est  ".$this->_id." est le nom est ".$this->_Nom;
        global $db;
        $delet = $db->prepare("DELETE FROM `user` WHERE `id_user` = ?");
        $delet->execute(array($this->_id));
    }
}
?>