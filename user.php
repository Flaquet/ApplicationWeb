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
        echo "L'id du user est ".$this->_id." Le pseudo du User est ".$this->_Nom;
    }

    public function deleteUser(){
        echo "".$this->_id."".$this->_Nom;
        global $db;
        $delet = $db->prepare("DELETE FROM `user` WHERE `id_user` = ?");
        $delet->execute(array($this->_id));
    }
}
?>