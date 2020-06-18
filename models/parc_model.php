<?php

class Parc_model extends Model {

    var $table = 'ordinateurs'; //nom de la table

    //retrourne enregistrements en fonction de leur adresse IP

    //retrourne enregistrements en fonction de leur adresse IP
   function getByIP($ip){        
	return $this->query("SELECT id as `Numéro`, ip as `IP`, mac as `MAC`, nom as `Nom`, salle as `Salle` FROM ".$this->table." WHERE ip LIKE '".addslashes($ip)."%' ORDER BY ip ASC");
   }
   
   function getBySalle() {
       $sql = "SELECT salle as `Salle`, count(id) as `Nombre de postes` "
               . "FROM ordinateurs GROUP BY salle ORDER BY salle ASC";
       return $this->query($sql);
   }

}

?>