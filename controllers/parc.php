<?php

class Parc extends Controller {

    var $models = array('Parc_model');
    var $parc_model;

    //Action index     
    function index() {
        $this->render('index');     //appel de la vue index.php
    }

    function recherche($ip) {
        $d['record'] = $this->parc_model->getByIP($ip);
        $this->set($d);
        $this->render('recherche');    //appel de la vue recherche.php
    }

    function formulaire_recherche() {
        $this->render('formulaire_recherche');    //appel de la vue formulaire_recherche.php
    }
    
    function liste_salles() {
        $d['record'] = $this->parc_model->getBySalle();
        $this->set($d);
        $this->render('liste_salles');
    }

}

?>