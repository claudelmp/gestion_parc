<?php

/** * Objet Model  * Permet les interactions avec la base de donnees  * */
class Model {

    public $table;
    public $id;
    private static $base;
    private static $serveur = 'localhost';
    private static $bdd = 'parc_info'; //nom de la base de données  		
    private static $user = 'root';
    private static $mdp = 'azerty';

    public function __construct() {
        //connexion à la base de données
        
        try {
            
            Model::$base = new PDO('mysql:host=' . Model::$serveur . ';dbname=' . Model::$bdd . ';', Model::$user, Model::$mdp, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
            );


            Model::$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        } catch (PDOException $e) {

            die('impossible de se connecter à la base de données');
        }
    }

    public function __destruct() {
        Model::$base = null;
    }

    /**     * Permet de faire une requete complexe      * @param $sql Requete a effectuer      * */
    public function query($sql) {


        $pre = Model::$base-> prepare($sql);
        $pre->execute();

        return $pre->fetchall(PDO::FETCH_ASSOC);
    }

    /**     * Permet de charger un model      * @param $name Nom du modele a charger      * */
    static function load($name) {
        require("$name.php");
        return new $name();
    }

}

?>
 